<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Probono;
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
        ]);
        $ActiveAdv = Probono::all();
        if ($ActiveAdv->count() == 0) {
            $users = User::orderBy('created_at', 'DESC')
            ->get();
             foreach ($users as $user) {
                 $id = $user->id;
             }
        }
        else {
           foreach ($ActiveAdv as $Active) {
           $users = User::where('id' ,'!=', $Active->referrel)
           ->orderBy('created_at', 'DESC')
           ->get();
            foreach ($users as $user) {
                $id = $user->id;
            }
        }  
        }    

       $referrel = ($request->status == 1) ? $id : $request->referrel;

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
            'referrel' => $referrel,
            'register' => auth()->guard('admin')->user()->id,
        ]);

        // ProbonoMember::create([
        //     'advocate' => $request->user,
        //     'probono' => $probono->id,
        // ]);

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
    public function addmember(Request $request)
    {

        // ProbonoMember::create([
        //  'probono' => $request->probono,
        //  'advocate' => $request->advcate_id,
        //     ]);

        //  return back()->with('success','Member Added Successfully');
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
