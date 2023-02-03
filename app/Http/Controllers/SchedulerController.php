<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\DisciplineSitting;

class SchedulerController extends Controller
{

    public function add_schedule_decision(Request $request)
    {

        DisciplineSitting::where('sitting_id',$request->sittind_id)->update([
            'decisionCategory' => $request->desision,
            'targetedAdvocate' => $request->tagetAdvocate,
            'comment' => $request->comment,
            'scheduledBy' => auth()->guard('admin')->user()->id,
         ]);
         if ($request->status == 1) {
           $case = Discipline::findorfail($request->case);
           $case->case_status = 'CLOSED';
           $case->save();
         }
         return back()->with('message','Decission Added Successfully');
    }
}
