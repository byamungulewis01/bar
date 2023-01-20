<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discipline;

class DisciplinaryController extends Controller
{
    public function index()
    {
        $users = User::all();
        $cases = Discipline::orderBy('id')->get();
        return view('cases.index', compact('users','cases'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'complaint' => 'required',
            'sammary' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $code = Discipline::all()->count()+1;
        $number = 'DC'.$code.date('Y');
            Discipline::create([
         'complaint' => $request->complaint,
         'sammary' => $request->sammary,
         'case_number' => $number,
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'advcate_id' => $request->advcate_id,
         'case_type' => $request->case_type,
         'createdby' => auth()->guard('admin')->user()->id,
            ]);
         return back()->with('success','New Case added!');
    }
    public function case_status(Request $request)
    {
        if ($request->status == 'closed') {
            $status = 'open';
           
        } else {
            $status = 'closed';
            
        }

        $discipline = Discipline::findorfail($request->case_id);
        $discipline->status = $status;
        $discipline->save();
        return back()->with('success','Status updates');

    }

    public function api(Request $request)
    {
      $data = Discipline::latest();
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
    public function show($case)
    {
        $case = Discipline::find($case);
        $users = User::all();
        $host = Admin::find(auth()->guard('admin')->user()->id);
        return view('cases.detail',compact('case','host','users'));
    }
}
