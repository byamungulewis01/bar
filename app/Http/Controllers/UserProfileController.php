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
        $probonos = Probono::where('advocate',$user)->orderBy('created_at','desc')->get();
        return view('myprofile.probono',compact('probonos'));
    }
    public function probono_store(Request $request)
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
            'advocate' => auth()->user()->id,
        ]);

         return back()->with('message','Probono registered!');
    }
    public function probono_update(Request $request)
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
            $probono->save();

            return back()->with('message','Probono update Successfully');

    }
    public function probono_delete(Request $request)
    {
        Probono::findorfail($request->probono)->delete();
        Probono_dev::where('probono_id', $request->probono)->delete();
        ProbonoFile::where('probono_id', $request->probono)->delete();

        return back()->with('message', 'Probono removed successfully');
    }

    public function probono_details($case)
    {   
        $probono = Probono::findorfail($case);
        $probono_devs = Probono_dev::where('probono_id' , $case)->orderBy('created_at','desc')->get();
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

        if ($request->hasFile('attach_file')) {
            $file      = $request->file('attach_file');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $case_file   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/files'), $case_file);
        } else {
            $case_file = NULL;
        }

        $probono = Probono::findorfail($request->probono);
        $probono->status = $request->status;
        $probono->save();

        Probono_dev::create([
            'status' => $request->status,
            'title' => $request->title,
            'narration' => $request->narration,
            'attach_file' => $case_file,
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
       
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $yearInBar = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;
        if ($request->price == 0.00) {
            $training = Training::findorfail($request->training);
            $booked = $training->booking;
            $confirmed = $training->confirm;
            $training->booking = $booked + 1;
            $training->confirm = $confirmed + 1;
            $training->save();

            Booking::create(['training' => $request->training, 'advocate' => $advocate,
                        'yearInBar' => $yearInBar , 'booked' => true, 'confirm' => true, 'status' => 2]);
        } else {
            $training = Training::findorfail($request->training);
            $booked = $training->booking;
            $training->booking = $booked + 1;
            $training->save();
            Booking::create(['training' => $request->training, 'advocate' => $advocate,
            'yearInBar' => $yearInBar , 'booked' => true, 'status' => 1]);
        }
        

       

        return back()->with('message',$training->title .'Booked');
    }
    public function book_remove(Request $request)
    {   
        $booking = Booking::findorfail($request->id);
        $train = $booking->training;
            if ($booking->price == 0.00) {
                $training = Training::findorfail($train);
                $booked = $training->booking;
                $confirmed = $training->confirm;
                $training->booking = $booked - 1;
                $training->confirm = $confirmed - 1;
                $training->save();  
        
            } else {
                $training = Training::findorfail($train);
                $booked = $training->booking;
                $training->booking = $booked - 1;
                $training->save();
            }
            
       
        $booking->delete();
        return back()->with('warning', 'Training Removed on List');
    }

    public function mytraings_detail($id)
    {
        $training = Training::findorfail($id);
        $topics = TrainingTopic::where('training_id',$id)->get();
        $materials = TrainingMaterial::where('training_id',$id)->get();

        $advocate = auth()->user()->id;
        $trainings = Training::where('publish' , 2)->get();
        $bookings = Booking::where('advocate' , $advocate)->get();
        $attendances = Booking::where('advocate' , $advocate)->where('attendanceDay', '<>', null)->whereIn('status',[1,2,3])->get();
        $booked = Booking::where('advocate',$advocate)->pluck('training')->toArray();

        

        return view('myprofile.trainings-details',compact('trainings','bookings','booked','training','topics','materials','attendances'));
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
