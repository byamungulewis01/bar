<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Probono;
use App\Models\ProbonoFile;
use Illuminate\Http\Request;
use App\Models\ProbonoMember;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProbonoController extends Controller
{
    public function index()
    {
        $users = User::all();

        $probonos = Probono::all();

        return view('probono.index', compact('users','probonos'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'referral_case_no' => 'required',
            'jurisdiction' => 'required',
            'court' => 'required',
            'case_nature' => 'required',
            'hearing_date' => 'required|date|after:'.Carbon::today()->toDateString(),
            'category' => 'required',
            'referrel' => 'required',
        ]);
        if ($request->status == 1) {
           
            $ActiveAdv = Probono::latest()->first();
            if ($ActiveAdv == null) {
                $user = User::latest('created_at')->first();
             $advocate = $user->id;
            }
            else {
                 if ($ActiveAdv->advocate == NULL) {
                    $count = Probono::count();
                    if ($count == 1) {
                        $user = User::latest('created_at')->first();
                        $advocate = $user->id;
                    } else {
                        $ids = Probono::where('advocate','!=',NULL)->pluck('advocate')->toArray();
                    $user = User::whereNotIn('id', $ids)->latest('created_at')->first();
                    $advocate = $user->id;
                    }
                
                 } else {
                    $ids = Probono::where('advocate','!=',NULL)->pluck('advocate')->toArray();
                    $user = User::whereNotIn('id', $ids)->latest('created_at')->first();
                    $advocate = $user->id;
                 }            
               
            } 
        } else {
            $advocate = null;
        }

         Probono::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'referral_case_no' => $request->referral_case_no,
            'jurisdiction' => $request->jurisdiction,
            'court' => $request->court,
            'case_nature' => $request->case_nature,
            'hearing_date' => $request->hearing_date,
            'category' => $request->category,
            'referrel' => $request->referrel,
            'advocate' => $advocate,
            'register' => auth()->guard('admin')->user()->id,
        ]);

         return back()->with('success','Probono registered!');
    }
    public function show($id)
    {
        // $members = ProbonoMember::where('probono',$id)->get();
        //     foreach ($members as $member) {
        //        // $users = User::where('id','!=',$member->advocate)->get();    
        //         $users = User::all();    
        //         $users = $users->except([$member->advocate]);    
        //     }
            

        // $probono = Probono::findorfail($id);
        // $hoster = $probono->register;
        // $host = Admin::find($hoster);
       

        // return view('probono.details', compact('probono','host','members','users'));
    }
    public function file_store(Request $request)
    {
        $this->validate($request,[
            'case_title' => 'required',
            'case_type' => 'required',
            'case_file' => 'required|mimes:pdf',
        ]);
        if($request->hasFile('case_file')){
            $file      = $request->file('case_file');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $case_file   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/files'), $case_file);
        }
        $count = ProbonoFile::where('probono_id', $request->probono_id)->count();
         if ($count >= 5) {
         return back()->with('success','Maximum Number 5 files');
         } else {
            ProbonoFile::create([
                'case_title' => $request->case_title,
                'case_type' => $request->case_type,
                'case_file' => $case_file,
                'probono_id' => $request->probono_id,
                'register' => auth()->guard('admin')->user()->id,
            ]);
    
             return back()->with('success','Case '.$count + 1 .' File uploaded');
         }
         
        
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'referral_case_no' => 'required',
            'jurisdiction' => 'required',
            'court' => 'required',
            'case_nature' => 'required',
            'hearing_date' => 'required|date|after:'.Carbon::today()->toDateString(),
            'category' => 'required',
            'referrel' => 'required',
        ]);

            $probono = Probono::findorfail($request->id);
            $probono->fname = $request->fname;
            $probono->lname = $request->lname;
            $probono->gender = $request->gender;
            $probono->age = $request->age;
            $probono->phone = $request->phone;
            $probono->referral_case_no = $request->referral_case_no;
            $probono->jurisdiction = $request->jurisdiction;
            $probono->court = $request->court;
            $probono->case_nature = $request->case_nature;
            $probono->hearing_date = $request->hearing_date;
            $probono->category = $request->category;
            $probono->referrel = $request->referrel;
            $probono->advocate = $request->advocate;
            $probono->register = auth()->guard('admin')->user()->id;
            $probono->save();

            return back()->with('success','Probono update Successfully');
    }

    public function api(Request $request)
    {
      $data = Probono::latest();
      if (! $request->expectsJson()) {
          return $data;
      }
      else{
          return response()->json([
              'success' => true,
              'data' => $data
          ]);
      }
    }
}
