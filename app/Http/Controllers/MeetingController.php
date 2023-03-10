<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Mail\ContactEmail;
use App\Models\Invitations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function index()
    {

        $meetings = Meeting::orderby('created_at','desc')->get();
        return view('meetings.index', compact('meetings'));
    }
    public function show($meeting)
    {
        // $invitations = Invitations::where('meeting_id', $meeting)->paginate(8);
        $invitations = DB::table('users')->join('invitation','users.id','=','invitation.user_id')
        ->where('invitation.meeting_id',$meeting)->orderby('users.name')
        ->paginate(8);
        $meeting = Meeting::findorfail($meeting);
        $users = User::all();
        return view('meetings.detail', compact('meeting','invitations','users'));
    }
    public function attendance($meeting)
    {
        // $invitations = Invitations::where('meeting_id', $meeting)->paginate(8);
        $invitations = DB::table('users')->join('invitation','users.id','=','invitation.user_id')
        ->where('invitation.meeting_id',$meeting)->orderby('users.name')
        ->paginate(8);
        $meeting = Meeting::findorfail($meeting);
        $users = User::all();
        return view('meetings.attendance', compact('meeting','invitations','users'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::Where('regNumber', 'LIKE', "%{$query}%")
        ->take(1)->get();
        return response()->json($users);
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
        $publish = Meeting::findorfail($request->meeting);
        $publish->published = 1;
        $publish->save();
        
       return back()->with('message','new Advocate invited');

    }
    public function api(Request $request)
    {
        $data = Meeting::orderby('date')->get();
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

        $concern = implode(',', $request->concern);

        $this->validate($request,[
            'title' => 'required', 'date' => 'required', 'end' => 'required',
            'venue' => 'required','credits' => 'required', 'concern' => 'required',
        ]);

        $concerns = [];
        foreach ($request->concern as $value) {
            $concerns[] = $value;
        }

   

        if ($request->published == 1) {
        $meeting = Meeting::create([
            'title' => $request->title,
            'date' => $date,
            'start' => $time,
            'end' => $request->end,
            'venue' => $request->venue,
            'credits' => $request->credits,
            'concern' =>  $concern,
            'published' => 1,
        ]);
        $users = User::whereIn('status',$concerns)->where('practicing',2)->get();
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
            'concern' =>  $concern,
            'published' => 0,
        ]);
        }

        return redirect()->route('meetings.index')->with('message','New meeting registared');   

    }
    public function update(Request $request)
    {
        $datetime = $request->date;
        $date = date("Y-m-d", strtotime($datetime));
        $time = date("H:i:s", strtotime($datetime));

        $meeting = Meeting::findorfail($request->meeting);
     
        if ($request->published == 1) {
            $meeting->title = $request->title;
            $meeting->date =  $date;
            $meeting->start = $time;
            $meeting->end = $request->end;
            $meeting->venue = $request->venue;
            $meeting->credits = $request->credits;
            $meeting->published = 1;
            $meeting->save();
        }
        else {
            $meeting->title = $request->title;
            $meeting->date =  $date;
            $meeting->start = $time;
            $meeting->end = $request->end;
            $meeting->venue = $request->venue;
            $meeting->credits = $request->credits;
            $meeting->published = 0;
            $meeting->save();
           
            Invitations::where('meeting_id', $request->meeting)->delete();
        }

        return redirect()->route('meetings.index')->with('message','New meeting registared');   

    }

    public function delete(Request $request)
    {
        $meeting = Meeting::findorfail($request->meeting);
        $meeting->delete();
        Invitations::where('meeting_id', $request->meeting)->delete();

        return back()->with('message', 'Meeting remove successfully');
    }

    public function removeInviter(Request $request)
    {
        $invitor = Invitations::findorfail($request->id);
        $invitor->delete();
        return back()->with('message', 'remove Successfully');
    }


    public function notify(Request $request)
    {
        $formField = $request->validate([
            'recipients' => 'required',
            'subject' => 'required',
            'message' => 'required|min:10',
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

         $ids = Invitations::where('status',$request->recipients)->where('meeting_id', $request->id)->pluck('user_id')->toArray();
         $users = User::whereIn('id', $ids)->get();
        
        foreach ($request->sent as $value) {
            if ($value == 'EMAIL') {
                foreach ($users as $user) {
                   (new NotifyController)->notify_meeting($user->email,$request->subject,$request->message,$attachmentsPaths);
                  }
         
            }elseif ($value == 'SMS') {
                foreach ($users as $user) {
                    (new NotifyController)->notify_sms($request->message,$user->phone);
                   }
            } else{
            foreach ($users as $user) {
                (new NotifyController)->notify_meeting($user->email,$request->subject,$request->message,$attachmentsPaths);
                (new NotifyController)->notify_sms($request->message,$user->phone);
                }
            }
       }

     return back()->with('message', 'Notified Successfully');
       
    }

    public function attends($meeting,$user)
    {
        $check = Invitations::where('meeting_id', $meeting)->where('user_id', $user)->count();;
        if ($check == 1) {
            Invitations::where('meeting_id', $meeting)->where('user_id', $user)
            ->take(1)->update([
            'status' => 2,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return back()->with('message', 'Added to Attendence');
        } else {
        return back()->with('warning', 'User Not Invited on This meeting');
        }
        
      
    }

}
