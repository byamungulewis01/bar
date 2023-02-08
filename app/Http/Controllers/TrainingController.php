<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

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
        return view('training.details' ,compact('training'));
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
}
