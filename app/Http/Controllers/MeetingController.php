<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Mail\ContactEmail;
use App\Models\Invitations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function index()
    {

        $meetings = Meeting::orderby('date')->get();
        return view('meetings.index', compact('meetings'));
    }
    public function show($meeting)
    {
        $invitations = Invitations::where('meeting_id', $meeting)->get();
        $meeting = Meeting::findorfail($meeting);
        $users = User::all();
        return view('meetings.detail', compact('meeting','invitations','users'));
    }
    public function create()
    {
        dd('here');
        $users = User::all();
        return view('meetings.create', compact('users'));
    }
    public function invite(Request $request)
    {
       foreach ($request->user as $key) {
        
        $check = Invitations::where('user_id', $key)->where('meeting_id', $request->meeting)->get();
        foreach ($check as $value) {
            $data = User::findorfail($value->user_id);
            $name = $data->name;
         return back()->with('warning',$name . ' Arleady invited choose others');
        }
      Invitations::create(['user_id' => $key, 'meeting_id' => $request->meeting, 'status' => 1]);

       }
       return back()->with('message','new Advocate invited');

    }
    public function api(Request $request)
    {
        $data = Meeting::latest()->with(['invitations', 'user'])->get();
        if (!$request->expectsJson()) {
            return $data;
        } else {
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }

    public function store(Request $request)
    {
        $datetime = $request->date;
        $date = date("Y-m-d", strtotime($datetime));
        $time = date("H:i:s", strtotime($datetime));
        if ($request->published == 1) {
        $meeting = Meeting::create([
            'title' => $request->title,
            'date' => $date,
            'start' => $time,
            'end' => $request->end,
            'venue' => $request->venue,
            'credits' => $request->credits,
            'published' => 1,
        ]);
        $users = User::all();
        foreach ($users as $user) {
            Invitations::create([
                    'user_id' => $user->id,
                    'meeting_id' => $meeting->id,
                    'status' => 1,
            ]);
        }
        }
        else {
            $meeting = Meeting::create([
            'title' => $request->title,
            'date' => $date,
            'start' => $time,
            'end' => $request->end,
            'venue' => $request->venue,
            'credits' => $request->credits,
            'published' => 0,
        ]);
        }

        return redirect()->route('meetings.index')->with('message','New meeting registared');   

    }

    public function removeInviter(Request $request)
    {
        $invitor = Invitations::findorfail($request->id);
        $invitor->delete();
        return back()->with('message', 'remove Successfully');
    }

}
