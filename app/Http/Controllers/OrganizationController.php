<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\NotifyController;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('users.organization',[
            'organizations' => $organizations
        ]);
    }

    public function api(Request $request)
    {
      $data = Organization::all();
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

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users|unique:organizations',
            'phone' => 'required|min:10|max:10|unique:organizations',
            'type' => 'required',
            'address' => 'required',
            'tin' => 'required|unique:organizations',
            'status' => 'required',
        ]);
        $password = 'password';

        $user = Organization::create(array_merge($request->only('name','email','phone','type','address','tin'),[
            'password' => Hash::make($password), 'blocked' => $request->status
        ]));
       // (new NotifyController)->newOrganization($email,$password);
        return back()->with('message','New Organization added!');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'type' => 'required',
            'address' => 'required',
            'tin' => 'required',
            'status' => 'required',
            'express' => 'required'
        ]);
      
        $organization = Organization::findorfail($request->express);

        $count = Organization::where('email',$request->email)->where('id','<>',$organization->id)->first();
        if($count > 0){
            throw ValidationException::withMessages([
                'email' => 'The email has already been taken.'
            ]);
        }

        $count = Organization::where('tin',$request->tin)->where('id','<>',$organization->id)->first();
        if($count > 0){
            throw ValidationException::withMessages([
                'tin' => 'The tin is already registered.'
            ]);
        }

        $count = Organization::where('phone',$request->phone)->where('id','<>',$organization->id)->first();
        if($count > 0){
            throw ValidationException::withMessages([
                'phone' => 'The phone is already registered.'
            ]);
        }
        $exEmail = $organization->email;
        $organization->name = $request->name;
        $organization->email = $request->email;
        $organization->phone = $request->phone;
        $organization->type = $request->type;
        $organization->address = $request->address;
        $organization->tin = $request->tin;
        $organization->blocked = $request->status;
        $organization->save();

        if($exEmail !== $request->email){
            (new NotifyController)->newEmail($request->email);
            (new NotifyController)->changedEmail();
        }

        return back()->with('message','Organization updated!');
    }

    public function destroy(Request $request, Organization $organization)
    {
        $organization = Organization::findorfail($organization->id);
        $organization->blocked = true;
        $organization->save();
        $organization->delete();
        if (! $request->expectsJson()) {
          return back()->with('message','Organization deleted successfully!');
        }
        else{
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
