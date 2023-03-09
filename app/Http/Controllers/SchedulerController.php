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

    
    public function notify(Request $request)
    {
      $formField = $request->validate([
          'user' => 'required',
          'message' => 'required',
          'sent' => 'required',
      ]);

      $recipient = [];
          foreach ($request->user as $value) {
              $recipient[] = $value;
          }
       $users = User::whereIn('id', $recipient)->get();
      
      foreach ($request->sent as $value) {
          if ($value == 'EMAIL') {
              foreach ($users as $user) {
                  // echo '<br> '.$user->name;
                  (new NotifyController)->notify($user->email,$request->subject,$request->message);
                }         
          }elseif ($value == 'SMS') {
              foreach ($users as $user) {
               (new NotifyController)->notify_sms($request->message,$user->phone);
              }
          } else{
          foreach ($users as $user) {
              (new NotifyController)->notify($user->email,$request->subject,$request->message);
              (new NotifyController)->notify_sms($request->message,$user->phone);
              }
          }
     }
     return back()->with('message', 'Notified Successfully');
  }
}
