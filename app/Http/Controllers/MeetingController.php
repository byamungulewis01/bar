<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('meetings.index', compact('users'));
    }

    public function api(Request $request)
    {
      $data = Meeting::latest()->with(['invitations','user'])->get();
      if (! $request->expectsJson()) {
          return $data;
      }
      else{
          return response()->json([
              'success' => true,
              'data' => $data
          ]);
      }
    }

    public function create()
    {
        $users = User::all();
        return view('meetings.create', compact('users'));
    }
}
