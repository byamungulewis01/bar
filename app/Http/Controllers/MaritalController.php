<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marital;

class MaritalController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->expectsJson()) {
            return marital::all();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        marital::create([
            'title'=>$request->title
        ]);

        return back()->with('message','Marital status added!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'token' => 'required'
        ]);
        $marital = marital::findorfail($request->token);
        $marital->title = $request->title;
        $marital->save();
        return back()->with('message','Status updates');
    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $marital = marital::findorfail($request->token);
        $marital->delete();
        return back()->with('message','Status Deleted');
    }
}
