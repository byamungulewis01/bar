<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingTopic;
use App\Models\TrainingMaterial;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class TrainingController extends Controller
{
    //
    public function index()
    {
        $trainings = Training::all();
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
    public function details($details)
    {
        $training = Training::findorfail($details);
        $topics = TrainingTopic::where('training_id',$details)->get();
        $materials = TrainingMaterial::where('training_id',$details)->get();
        return view('training.details' ,compact('training','topics','materials'));
    }
    public function booked($details)
    {
        $training = Training::findorfail($details);
        $bookings = Booking::where('training' , $details)->get();

        return view('training.booked' ,compact('training','bookings'));
    }
    public function confirmed($details)
    {
        $training = Training::findorfail($details);
        $bookings = Booking::where('training' , $details)->where('confirm', true)->get();
        return view('training.confirmed' ,compact('training','bookings'));
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
            'file_name' => 'required',
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
    
}
