<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Probono;
use Illuminate\Http\Request;
use App\Models\ProbonoMember;
use Illuminate\Support\Facades\DB;

class ProbonoController extends Controller
{
    public function index()
    {
        $users = User::all();

        $probonos = DB::table('probono')
            ->leftJoin('probono_members' ,'probono.id','=','probono_members.probono')
            ->get();

        return view('probono.index', compact('users','probonos'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'referral_name' => 'required',
            'referral_mobile' => 'required',
            'referral_gender' => 'required',
            'referral_case_no' => 'required',
            'case_nature' => 'required',
            'hearing_date' => 'required',
            'category' => 'required',
        ]);
  
        $probono = Probono::create([
            'referral_name' => $request->referral_name,
            'referral_mobile' => $request->referral_mobile,
            'referral_gender' => $request->referral_gender,
            'referral_case_no' => $request->referral_case_no,
            'case_nature' => $request->case_nature,
            'hearing_date' => $request->hearing_date,
            'category' => $request->category,
            'register' => auth()->guard('admin')->user()->id,
            'case_status' => 'OPEN',
        ]);

        ProbonoMember::create([
            'advocate' => $request->user,
            'probono' => $probono->id,
        ]);

         return back()->with('success','Probono registered!');
    }
    public function show($id)
    {
        $members = ProbonoMember::where('probono',$id)->get();
            foreach ($members as $member) {
               // $users = User::where('id','!=',$member->advocate)->get();    
                $users = User::all();    
                $users = $users->except([$member->advocate]);    
            }
            

        $probono = Probono::findorfail($id);
        $hoster = $probono->register;
        $host = Admin::find($hoster);
       

        return view('probono.details', compact('probono','host','members','users'));
    }
    public function addmember(Request $request)
    {

        ProbonoMember::create([
         'probono' => $request->probono,
         'advocate' => $request->advcate_id,
            ]);

         return back()->with('success','Member Added Successfully');
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
