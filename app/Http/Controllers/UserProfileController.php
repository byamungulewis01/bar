<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Meeting;
use App\Models\Probono;
use App\Models\Training;
use App\Models\Discipline;
use App\Models\Probono_dev;
use App\Models\ProbonoFile;
use App\Models\Lawscategory;
use Illuminate\Http\Request;
use App\Models\TrainingTopic;
use App\Models\TrainingMaterial;
use App\Models\DisciplineSitting;
use App\Models\DisciplineParticipant;

class UserProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
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

        $part = DisciplineParticipant::where('advocate',$user_id)->get();

        $ids = DisciplineParticipant::where('advocate',$user_id)->pluck('discipline_case')->toArray();
      
        $cases = Discipline::whereIn('id',$ids)->get();

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
    public function probono()
    {   
        $user = auth()->user()->id;
        $probonos = Probono::where('advocate',$user)->get();
        return view('myprofile.probono',compact('probonos'));
    }
 
    public function probono_details($case)
    {   
        $probono = Probono::findorfail($case);
        $probono_devs = Probono_dev::where('probono_id' , $case)->get();
        $files = ProbonoFile::where('probono_id' , $case)->get();
        return view('myprofile.probono_delails',compact('probono','probono_devs','files'));
    }
    public function probono_dev(Request $request)
    {   
        $this->validate($request,[
            'status' => 'required',
            'title' => 'required',
            'narration' => 'required',
        ]);

        $probono = Probono::findorfail($request->probono);
        $probono->status = $request->status;
        $probono->save();

        Probono_dev::create([
            'status' => $request->status,
            'title' => $request->title,
            'narration' => $request->narration,
            'probono_id' => $request->probono,
       ]);

       $probono = Probono::findorfail($request->probono);
       $probono->probono_devs = $probono->probono_devs + 1;
       $probono->save();

        return back()->with('message','New Development');
    }   
    public function mytraings()
    {   
        $advocate = auth()->user()->id;
        $trainings = Training::where('publish' , 2)->orderBy('created_at','desc')->get();
        $bookings = Booking::where('advocate' , $advocate)->get();
        $booked = Booking::where('advocate',$advocate)->pluck('training')->toArray();
        $attendances = Booking::where('advocate' , $advocate)->where('attendanceDay', '<>', null)->whereIn('status',[1,2,3])->get();
        return view('myprofile.trainings',compact('trainings','bookings','booked','attendances'));
    }
    public function training_book(Request $request)
    {   
        $advocate = auth()->user()->id;
        $training = Training::findorfail($request->training);
        $booked = $training->booking;
        $training->booking = $booked + 1;
        $training->save();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $yearInBar = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;

        Booking::create(['training' => $request->training, 'advocate' => $advocate,
                        'yearInBar' => $yearInBar , 'booked' => true, 'status' => 1]);

        return back()->with('message',$training->title .'Booked');
    }
    public function book_remove(Request $request)
    {   
        $booking = Booking::findorfail($request->id);
        $train = $booking->training;

        $training = Training::findorfail($train);
        $booked = $training->booking;
        $training->booking = $booked - 1;
        $training->save();

        $booking->delete();
        return back()->with('warning', 'Training Removed on List');
    }
    public function paytraining(Request $request)
    {   
        $booking = Booking::findorfail($request->id);
        $booking->confirm = true;
        $booking->status = 2;
        $train = $booking->training;
        $booking->save();

        $training = Training::findorfail($train);
        $confirm = $training->confirm;
        $training->confirm = $confirm + 1;
        $training->save();

        return back()->with('message', 'Training Payeed Successfully');
    }

    public function mytraings_detail($id)
    {
        $training = Training::findorfail($id);
        $topics = TrainingTopic::where('training_id',$id)->get();
        $materials = TrainingMaterial::where('training_id',$id)->get();

        $advocate = auth()->user()->id;
        $trainings = Training::where('publish' , 2)->get();
        $bookings = Booking::where('advocate' , $advocate)->get();
        $booked = Booking::where('advocate',$advocate)->pluck('training')->toArray();

        

        return view('myprofile.trainings-details',compact('trainings','bookings','booked','training','topics','materials'));
    }
    public function makeAttendence(Request $request)
    {
        $check = Booking::where('training',$request->training)
        ->where('voucherNumber',$request->voucher)->where('advocate',auth()->user()->id)->
        first();
        if ($check) {
            Booking::where('training',$request->training)->where('advocate',auth()->user()->id)
            ->update(['status' => 4,
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);
        } else {
            return back()->with('warning', 'Voucher Number Does not much');
        }
        return back()->with('message', 'Attendance Done');

    }



}
