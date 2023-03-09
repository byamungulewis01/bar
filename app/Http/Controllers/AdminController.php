<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Meeting;
use App\Models\Probono;
use App\Models\Discipline;
use App\Models\Phonenumber;
use App\Models\Contribution;
use Illuminate\Http\Request;
use App\Models\DisciplineMember;
use App\Models\DisciplineSitting;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\DisciplineParticipant;

class AdminController extends Controller
{
    //
    public function profile(User $user)
    {       
        $user_id = $user->id;
        $User = User::findorfail($user->id)->with('phone','address','areas');

        $logs = User::find($user->id)->authentications;
        $laws = $user->areas->pluck('lawscategory_id')->toArray();
        $roles = Role::where('guard_name','web')->pluck('name')->toArray();
        $userlaws = $user->areas->pluck('lawscategory_id')->toArray();
        $facebook = '';
        $instagram = '';
        $twitter = '';
        $whatsapp = '';
        foreach($user->socials as $social){
            $facebook = $social->social == 'facebook' ? $social->link : $facebook;
            $instagram = $social->social == 'instagram' ? $social->link : $instagram;
            $twitter = $social->social == 'twitter' ? $social->link : $twitter;
            $whatsapp = $social->social == 'whatsapp' ? $social->link : $whatsapp;
        }

        $facebook = empty($facebook) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-trash','link'=>$facebook,'btn'=>'danger', 'label'=>'unlink'] ;
        $instagram = empty($instagram) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-trash','link'=>$instagram,'btn'=>'danger', 'label'=>'unlink'];
        $twitter = empty($twitter) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-trash','link'=>$twitter,'btn'=>'danger', 'label'=>'unlink'] ;
        $whatsapp = empty($whatsapp) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-trash','link'=>$whatsapp,'btn'=>'danger', 'label'=>'unlink'] ;

        return view('profile.profile',compact('user_id','user','logs','roles','userlaws','facebook','instagram','twitter','whatsapp'));
    }
    public function discipline($user)
    {
        $cases = Discipline::where('p_advocate',$user)->orWhere('d_advocate',$user)->get();
        $user = User::findorfail($user);
        $user_id = $user->id;

        return view('profile.discipline',compact('cases','user_id'));
    }

    public function discipline_delails($user,$case)
    {
        $sittings = DisciplineSitting::where('discipline_case',$case)->get();
        $members = DisciplineParticipant::where('discipline_case',$case)->get();

        $case = Discipline::findorfail($case);
        $user_id = $user;
        return view('profile.discipline_delails',compact('case','user_id','members','sittings'));
    }  
      public function meeting($user)
    {
        $meetings = Meeting::join('invitation', 'meetings.id', '=', 'invitation.meeting_id')
        ->where('invitation.user_id', $user)
        ->select('meetings.*', 'invitation.*')
        ->orderby('date')->get();
        $user = User::findorfail($user);
        $user_id = $user->id;
        return view('profile.meeting',compact('meetings','user_id'));
    }
      public function probono($user)
    {
        $probonos = Probono::where('advocate',$user)->get();
        $user = User::findorfail($user);
        $user_id = $user->id;
        return view('profile.probono',compact('probonos','user_id'));
    }
      public function training($user)
    {
        $probonos = Probono::where('advocate',$user)->get();
        $user = User::findorfail($user);
        $user_id = $user->id;
        return view('profile.training',compact('probonos','user_id'));
    }
      public function compliance($user)
    {
        $currentYear = Carbon::now()->year;
        $probonos = Probono::where('advocate',$user)->get();
        $user = User::findorfail($user);
        $user_id = $user->id;
        $contribution = Contribution::where('yearInBar', $currentYear)->first();
        return view('profile.compliance',compact('probonos','user','user_id','contribution'));
    }

    public function notify()
    {
        $users = User::where('practicing', '<>', 6)->get();
        return view('notify',compact('users'));
    }
    public function send_notify(Request $request)
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
