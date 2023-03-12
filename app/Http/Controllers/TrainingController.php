<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingTopic;
use App\Models\TrainingMaterial;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    //
    public function index()
    {
     $trainings = Training::orderBy('created_at','desc')->get();
     return view('training.index' ,compact('trainings'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'venue' => 'required',
            'credits' => 'required',
            'price' => 'required',
            'starton' => 'required',
            'endon' => 'required',
            'early_deadline' => 'required',
            'late_deadline' => 'required',
            'rate' => 'required',
            'seats' => 'required',
        ]);
  
       $publish = $request->publish == 1 ? 2 : 1;
         Training::create([
            'title' => $request->title,
            'category' => $request->category,
            'venue' => $request->venue,
            'credits' => $request->credits,
            'price' => $request->price,
            'starton' => $request->starton,
            'endon' => $request->endon,
            'early_deadline' => $request->early_deadline,
            'late_deadline' => $request->late_deadline,
            'rate' => $request->rate,
            'seats' => $request->seats,
            'publish' => $publish,
            'register' => auth()->guard('admin')->user()->id,
        ]);

         return back()->with('message','Training registered!');
    }
    public function delete(Request $request)
    {
    Training::findorfail($request->id)->delete();
    TrainingMaterial::where('training_id',$request->id)->delete();
    TrainingTopic::where('training_id',$request->id)->delete();
    Booking::where('training',$request->id)->delete();
    return back()->with('message','Training removed');
    }
    public function details($details)
    {
        $users = User::where('practicing' ,2)->orderby('name')->get();
        $training = Training::findorfail($details);
        $topics = TrainingTopic::where('training_id',$details)->get();
        $materials = TrainingMaterial::where('training_id',$details)->get();
        return view('training.details' ,compact('training','topics','materials','users'));
    }
    public function booked($details)
    {
        $users = User::where('practicing' ,2)->orderby('name')->get();
        $training = Training::findorfail($details);
        $bookings = Booking::where('training' , $details)->where('booked',true)->get();

        return view('training.booked' ,compact('training','bookings','users'));
    }
    public function confirmed($details)
    {
        $users = User::where('practicing' ,2)->orderby('name')->get();
        $training = Training::findorfail($details);
        $bookings = Booking::where('training' , $details)->where('confirm', true)->get();
        return view('training.confirmed' ,compact('training','bookings','users'));
    }
    public function manage($details)
    {
        $users = User::where('practicing' ,2)->orderby('name')->get();
        $training = Training::findorfail($details);
        $bookings = Booking::where('training' , $details)->paginate(10);
        $bookings_count = $bookings->count();
        return view('training.manage' ,compact('training','bookings','users','bookings_count'));
    }
    public function EditBulk(Request $request)
    {
        $formDate = $request->validate([
            'user' => 'required',
            'price' => 'required',
            'credits' => 'required',
            'status' => 'required',
        ]);
        Booking::findorfail($request->id)->update($formDate);
        return back()->with('message','Edited Bulk');
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'venue' => 'required',
            'credits' => 'required',
            'price' => 'required',
            'starton' => 'required',
            'endon' => 'required',
            'early_deadline' => 'required',
            'late_deadline' => 'required',
            'rate' => 'required',
            'seats' => 'required',
        ]);
  
             $publish = $request->publish == 1 ? 2 : 1;
             $training = Training::find($request->id);
             $training->title = $request->title;
             $training->category = $request->category;
             $training->venue = $request->venue;
             $training->credits = $request->credits;
             $training->price = $request->price;
             $training->starton = $request->starton;
             $training->endon = $request->endon;
             $training->early_deadline = $request->early_deadline;
             $training->late_deadline = $request->late_deadline;
             $training->rate = $request->rate;
             $training->seats = $request->seats;
             $training->publish = $publish;
             $training->register = auth()->guard('admin')->user()->id;
             $training->save();

         return back()->with('message','Training Updated!');
    }
   public function addTopic(Request $request)
    {
        $formDate = $request->validate([
            'topic' => 'required',
            'startAt' => 'required',
            'endAt' => 'required',
            'trainer' => 'required',
        ]);
        $formDate['training_id'] =  $request->id;
        $formDate['register'] =  auth()->guard('admin')->user()->id;
        TrainingTopic::create($formDate);
        return back()->with('message','Training Topic Added');
    }
  
   public function topicDelete(Request $request)
    {
        
      $topic = TrainingTopic::find($request->topic_id);
      $topic->delete();
     return back()->with('warning','Training Topic Deleted');
    } 
    public function addMaterial(Request $request)
    {
        $formDate = $request->validate([
            'title' => 'required',
            'file_name' => 'required|mimes:doc,docx,ppt,pptx,pdf',
        ]);

        if($request->hasFile('file_name')){
            $file      = $request->file('file_name');
            $filename  = $file->getClientOriginalName();
            $material   = date('His').'-'.$filename;
           $file->move(public_path('assets/img/materials'), $material);
        }
        $formDate['training_id'] = $request->id;
        $formDate['file'] = $material;
        $formDate['register'] = auth()->guard('admin')->user()->id;
        TrainingMaterial::create($formDate);
        return back()->with('message','Training Material Added');
    }
    public function download($file)
    { 
        $pathToFile = public_path('assets/img/materials/'.$file);
     return response()->download($pathToFile);
    }
    public function materialDelete(Request $request)
    {
        
      $material = TrainingMaterial::find($request->id);
      $pathToFile = public_path('assets/img/materials/');
      $filename = $material->file;
      unlink($pathToFile .$filename);
      $material->delete();
     return back()->with('warning','Training Material Deleted');
    } 

    public function addParticipant(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $yearInBar = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;
        foreach ($request->user as $user) {
            $check = Booking::where('advocate', $user)->where('training', $request->id)->get();
            foreach ($check as $value) {
                $data = User::findorfail($value->advocate);
                $name = $data->name;
             return back()->with('warning',$name . ' Arleady Existy');
            }
            Booking::create(['training' => $request->id,'advocate' => $user ,'yearInBar' => $yearInBar,'status' => 3]);
        }
        return to_route('trainings.manage' ,$request->id)->with('message', 'Participant Added');
    }
    public function generateVouchers(Request $request)
    {
       $users = Booking::where('training', $request->id)->get();
        foreach ($users as $user) {
            Booking::where('advocate',$user->advocate)->where('training', $request->id)
            ->update(['attendanceDay' => $request->attendanceDay,
            'cumulatedCredit' => 2.0,
            'voucherNumber' => rand(1000000, 9999999),
        ]);
        }

    return back()->with('message','Attendence Voucher numbers created');

    }

    public function voucher($id)
    {
        $vouchers = Booking::where('training' ,$id)->get();
       return view('training.attendancevourcher',compact('vouchers'));
    }

    public function notify(Request $request)
    {
        $formField = $request->validate([
            'recipients' => 'required',
            'subject' => 'required',
            'message' => 'required|min:10',
            'sent' => 'required',
        ]);

        $recipient = [];
            foreach ($request->recipients as $value) {
                $recipient[] = $value;
            }

         $ids = Booking::whereIn('status',$recipient)->where('training', $request->id)->pluck('advocate')->toArray();
         $users = User::whereIn('id', $ids)->get();
        
        foreach ($request->sent as $value) {
            if ($value == 'EMAIL') {
                foreach ($users as $user) {
                    // echo '<br> '.$user->name;
                    (new NotifyController)->notify_training($user->email,$request->subject,$request->message);
                  }         
            }elseif ($value == 'SMS') {
              echo 'In SMS';
            } else{
            foreach ($users as $user) {
                (new NotifyController)->notify_training($user->email,$request->subject,$request->message);
                }
            }
       }

     return back()->with('message', 'Notified Successfully');
       
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


}
