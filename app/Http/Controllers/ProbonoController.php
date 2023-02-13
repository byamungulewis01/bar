<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Probono;
use App\Models\Probono_dev;
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

         return back()->with('message','Probono registered!');
    }
    public function show($id)
    {
        $probono = Probono::findorfail($id);
        $files = ProbonoFile::where('probono_id' , $id)->get();

        return view('probono.details', compact('probono','files'));
    }
    public function show_devs($id)
    {
        $probono = Probono::findorfail($id);
        $probono_devs = Probono_dev::where('probono_id' , $id)->get();

        return view('probono.devs', compact('probono','probono_devs'));
    }
    public function download($file)
    { 
        $pathToFile = public_path('assets/img/files/'.$file);
     return response()->download($pathToFile);
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
         return back()->with('warning','Maximum Number 5 files');
         } else {
            ProbonoFile::create([
                'case_title' => $request->case_title,
                'case_type' => $request->case_type,
                'case_file' => $case_file,
                'probono_id' => $request->probono_id,
                'register' => auth()->guard('admin')->user()->id,
            ]);
        $probono = Probono::findorfail($request->probono_id);
        $probono->probono_files = $probono->probono_files + 1;
        $probono->save();
             return redirect()->back()->with('message','Case '.$count + 1 .' File uploaded');
         }
         
        
    }
    public function file_delete(Request $request)
    {
      $probonoFile = ProbonoFile::find($request->id);
      $pathToFile = public_path('assets/img/Files/');
      $filename = $probonoFile->case_file;
      $prob_id = $probonoFile->probono_id;

      $probono = Probono::findorfail($prob_id);
      $probono->probono_files = $probono->probono_files - 1;
      $probono->save();


      unlink($pathToFile .$filename);
      $probonoFile->delete();
     return back()->with('warning','File Removed');
        
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
            'hearing_date' => 'required|date',
            'category' => 'required',
            'referrel' => 'required',
        ]);
        $advocate = ($request->advocate == '') ? null : $request->advocate;

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
            $probono->advocate = $advocate;
            $probono->register = auth()->guard('admin')->user()->id;
            $probono->save();

            return back()->with('message','Probono update Successfully');
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
