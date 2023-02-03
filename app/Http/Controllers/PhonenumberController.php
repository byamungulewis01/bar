<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phonenumber;

class PhonenumberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|unique:phonenumbers'
        ]);

        $user = auth()->user();

        Phonenumber::create([ 'user_id'=>$user->id, 'name' => $request->name, 'phone' => $request->phone]);

        return back()->with('message','Phone number added!');
    }

    public function destroy(Phonenumber $phonenumber)
    {
        $phonenumber = Phonenumber::findorfail($phonenumber->id);
        $phonenumber->delete();
        
        return back()->with('message','Phone deleted successfully!');
    }
}