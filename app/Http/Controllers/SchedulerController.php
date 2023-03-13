<?php

namespace App\Http\Controllers;

use App\Models\User;
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
          'party' => 'required',
          'message' => 'required',
          'sent' => 'required',
          'attachments.*' => 'max:10240', // Maximum file size of 10 MB
          'attachments' => 'max:5' // Maximum of 5 files
      ]);

      $attachments = $request->file('attachments');
      $attachmentsPaths = [];
      if ($attachments) {
          foreach ($attachments as $attachment) {
              $path = $attachment->store('attachments');
              $attachmentsPaths[] = $path;
          }
      }

      foreach ($request->party as $parti) {
        if ($parti == 'Plaintiffs') {
            if ($request->case_type == 1) {
                # code...
                $plaintiff = Discipline::find($request->case_id);
                $p_email = $plaintiff->p_email;
                $p_phone = $plaintiff->p_phone;

                foreach ($request->sent as $value) {
                    if ($value == 'EMAIL') {
                    (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);                              
                    }elseif ($value == 'SMS') {
                    (new NotifyController)->sms($request->message,$p_phone);
                    } else{
                        (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);   
                        (new NotifyController)->sms($request->message,$p_phone);
                    }
               }

              }
              elseif ($request->case_type == 2) {
                    # code...
                    $plaintiff = Discipline::find($request->case_id);
                    $user = User::find($plaintiff->p_advocate);
                    $p_email = $user->email;
                    $p_phone = $user->phone;
    
                    foreach ($request->sent as $value) {
                        if ($value == 'EMAIL') {
                        (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);                              
                        }elseif ($value == 'SMS') {
                        (new NotifyController)->notify_sms($request->message,$p_phone);
                        } else{
                            (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);   
                            (new NotifyController)->notify_sms($request->message,$p_phone);
                        }
                   }
              }
              else {
                      # code...
                      $plaintiff = Discipline::find($request->case_id);
                      $user = User::find($plaintiff->p_advocate);
                      $p_email = $user->email;
                      $p_phone = $user->phone;
      
                      foreach ($request->sent as $value) {
                          if ($value == 'EMAIL') {
                          (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);                              
                          }elseif ($value == 'SMS') {
                          (new NotifyController)->notify_sms($request->message,$p_phone);
                          } else{
                              (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);   
                              (new NotifyController)->notify_sms($request->message,$p_phone);
                          }
                     }
              }

        }elseif ($parti == 'Defendants') {
            if ($request->case_type == 1) {
                # code...
                $defandant = Discipline::find($request->case_id);
                $d_email = $defandant->d_email;
                $d_phone = $defandant->d_phone;

                foreach ($request->sent as $value) {
                    if ($value == 'EMAIL') {
                    (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);                              
                    }elseif ($value == 'SMS') {
                    (new NotifyController)->sms($request->message,$d_phone);
                    } else{
                        (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);   
                        (new NotifyController)->sms($request->message,$d_phone);
                    }
               }

              }
              elseif ($request->case_type == 2) {
                    # code...
                    $defandant = Discipline::find($request->case_id);
                    $user = User::find($defandant->d_advocate);
                    $d_email = $user->email;
                    $d_phone = $user->phone;
    
                    foreach ($request->sent as $value) {
                        if ($value == 'EMAIL') {
                        (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);                              
                        }elseif ($value == 'SMS') {
                        (new NotifyController)->notify_sms($request->message,$d_phone);
                        } else{
                            (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);   
                            (new NotifyController)->notify_sms($request->message,$d_phone);
                        }
                   }
              }
              else {
                      # code...
                    $defandant = Discipline::find($request->case_id);
                    $user = User::find($defandant->d_advocate);
                    $d_email = $user->email;
                    $d_phone = $user->phone;
    
                    foreach ($request->sent as $value) {
                        if ($value == 'EMAIL') {
                        (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);                              
                        }elseif ($value == 'SMS') {
                        (new NotifyController)->notify_sms($request->message,$d_phone);
                        } else{
                            (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);   
                            (new NotifyController)->notify_sms($request->message,$d_phone);
                        }
                   }
              }

        }elseif ($parti == 'Plaintiffs' && $parti == 'Defendants') {
              # code...
              $plaintiff = Discipline::find($request->case_id);
              $user = User::find($plaintiff->p_advocate);
              $p_email = $user->email;
              $p_phone = $user->phone;

              foreach ($request->sent as $value) {
                  if ($value == 'EMAIL') {
                  (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);                              
                  }elseif ($value == 'SMS') {
                  (new NotifyController)->notify_sms($request->message,$p_phone);
                  } else{
                      (new NotifyController)->notify_discipline($p_email,$request->subject,$request->message,$attachmentsPaths);   
                      (new NotifyController)->notify_sms($request->message,$p_phone);
                  }
             }

             $defandant = Discipline::find($request->case_id);
             $user = User::find($defandant->d_advocate);
             $d_email = $user->email;
             $d_phone = $user->phone;

             foreach ($request->sent as $value) {
                 if ($value == 'EMAIL') {
                 (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);                              
                 }elseif ($value == 'SMS') {
                 (new NotifyController)->notify_sms($request->message,$d_phone);
                 } else{
                     (new NotifyController)->notify_discipline($d_email,$request->subject,$request->message,$attachmentsPaths);   
                     (new NotifyController)->notify_sms($request->message,$d_phone);
                 }
            }

        }
         else {
            return back()->with('warning', 'You Need to choose Parties');
        }
        
      }

  
     return back()->with('message', 'Notified Successfully');
  }
}
