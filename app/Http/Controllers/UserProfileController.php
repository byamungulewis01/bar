<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Discipline;
use App\Models\Lawscategory;
use Illuminate\Http\Request;
use App\Models\DisciplineSitting;
use App\Models\DisciplineParticipant;

class UserProfileController extends Controller
{
    
    public function myprofile()
    {
        $user = auth()->user();

        $laws = Lawscategory::all();
        $userlaws = $user->areas->pluck('lawscategory_id')->toArray();
        $logs = User::find($user->id)->authentications;
        
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

        return view('myprofile.myprofile',compact('user','logs','laws','userlaws','facebook','instagram','twitter','whatsapp'));
    }
    public function mydiscipline()
    {
        $user = auth()->user();
        $user_id = $user->id;

        $cases = Discipline::where('p_advocate',$user_id)->orWhere('d_advocate',$user_id)->get();

        return view('myprofile.discipline',compact('user','cases'));
    }
    
    public function discipline_delails($case)
    {
        $sittings = DisciplineSitting::where('discipline_case',$case)->get();
        $members = DisciplineParticipant::where('discipline_case',$case)->get();

        $case = Discipline::findorfail($case);
        return view('myprofile.discipline_delails',compact('case','members','sittings'));
    }  
      public function mymeeting()
    {
        $user = auth()->user()->id;
        $meetings = Meeting::join('invitation', 'meetings.id', '=', 'invitation.meeting_id')
        ->where('invitation.user_id', $user)
        ->select('meetings.*', 'invitation.*')
        ->orderby('date')->get();

        return view('myprofile.meeting',compact('meetings'));
    }

}
