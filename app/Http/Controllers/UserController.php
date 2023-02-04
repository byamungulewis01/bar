<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marital;
use App\Models\User;
use App\Models\Phonenumber;
use App\Models\Admission;
use App\Models\Lawscategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\NotifyController;
use Spatie\Permission\Models\Roles;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $marital = marital::all();
        $allUsers = User::all()->count();
        $activeUsers = User::where('practicing','<=',2)->count();
        $inactiveUsers = User::where('practicing',3)->count();
        $suspendedUsers = User::where('practicing',4)->count();
        $struckoffUsers = User::where('practicing',5)->count();
        $deseacedUsers = User::where('practicing',6)->count();
        return view('users.individual',compact('marital','allUsers','activeUsers','inactiveUsers','suspendedUsers','struckoffUsers','deseacedUsers'));
    }

    public function deactivated()
    {
        return view('users.inactive');
    }

    public function api(Request $request)
    {
      $data = User::latest()->with(['phone'])->get();
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

    public function inactive(Request $request)
    {
      $data = User::onlyTrashed()->with(['phone'])->get();
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
            'district' => 'required',
            'gender' => 'required',
            'marital' => 'required',
            'date' => 'required',
            'category' => 'required',
            'profile' => 'required',
            'status' => 'required',
            'practicing' => 'required',
        ]);
        
        if($request->hasFile('profile')){
            $file      = $request->file('profile');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $profile   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/avatars'), $profile);
        }

        if($request->hasFile('diploma')){
            $file      = $request->file('diploma');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $diploma   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/diploma'), $diploma);
        }
        else
        {
            $diploma = null; 
        }

        $email = $request->email;
        // $password = Str::random(10);
         $password = 'password';
        $date = strtotime($request->date);
        $staff = User::where('category','Staff')->count();
        $advocate = User::where('category','Advocate')->count();
        $ons = $advocate < 10 ? '0' : ''; 
        $hun = $advocate < 100 ? '0' : ''; 
        $id = $hun.$ons.$advocate+1;
        $status = intval($request->status) < 3 ? 1 : 0;
        $year = $status ? date('Y', $date) : date('y', $date);
        $start = $status ? $id : 'RSTA';
        $middle = $status ? (intval($request->status) == 1 ? 'T' : 'S') : $staff+1;
        $idNumber = $start.'/'.$middle.'/'.$year;

        $category = $status ? 'Advocate' : 'Staff';

        $practicing = !$status ? '1' : ($request->practicing == 1 ? 2 : $request->practicing);

        $user = User::create(array_merge($request->only('name','email','district','gender','marital','status','date'),[
            'password' => Hash::make($password),
            'regNumber' => $idNumber,
            'category' => $category,
            'practicing' => $practicing,
            'photo' => $profile,
            'diplome' => $diploma
        ]));
        
        Phonenumber::create([ 'user_id'=>$user->id, 'name' => 'mobile', 'phone' => $request->phone]);
        // (new NotifyController)->newAccount($email,$password);

        return back()->with('message','New User added!');
    }

    public function update(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'district' => 'required',
            'gender' => 'required',
            'marital' => 'required',
            'status' => 'required',
            'category' => 'required',
            'date' => 'required',
            'practicing' => 'required',
            'express' => 'required'
        ]);

        $user = User::findorfail($request->express);

        $count = User::where('email',$request->email)->where('id','<>',$user->id)->first();
        if($count){
            throw ValidationException::withMessages([
                'email' => 'The email has already been taken.'
            ]);
        }
        
        if($request->hasFile('profile')){
            $file      = $request->file('profile');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $profile   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/avatars'), $profile);
        }

        if($request->hasFile('diploma')){
            $file      = $request->file('diploma');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $diploma   = date('His').'-'.$filename;
            $file->move(public_path('assets/img/diploma'), $diploma);
        }

        $email = $request->email;
        $password = Str::random(10);
        $date = strtotime($request->date);
        $staff = User::where('category','Staff')->count();
        $advocate = User::where('category','Advocate')->count();
        $ons = $advocate < 10 ? '0' : ''; 
        $hun = $advocate < 100 ? '0' : ''; 
        $id = $hun.$ons.$advocate+1;
        $status = intval($request->status) < 3 ? 1 : 0;
        $year = $status ? date('Y', $date) : date('y', $date);
        $start = $status ? $id : 'RSTA';
        $middle = $status ? (intval($request->status) == 1 ? 'T' : 'S') : $staff+1;
        $idNumber = $start.'/'.$middle.'/'.$year;
        $newId = $user->regNumber;
        $category = $status ? 'Advocate' : 'Staff';
        $exEmail = $user->email;
        $practicing = !$status ? '1' : ($request->practicing == 1 ? 2 : $request->practicing);

        if($category == $user->category ){
            if($user->status != $request->status){
                if($category == 'Advocate'){
                    $exId = explode('/',$user->regNumber);
                    $newId = $exId[0].'/'.$middle.'/'.$exId[2];
                }
            }
            elseif($user->date->format('Y') !== date('Y', $date)){
                $exId = explode('/',$user->regNumber);
                $newId = $exId[0].'/'.$exId[1].'/'.$year;
            }
        }
        elseif($category !== $user->category){
            $newId = $idNumber;
        }

        $user->name = $request->name;
        $user->district = $request->district;
        $user->gender = $request->gender;
        $user->marital = $request->marital;
        $user->status = $request->status;
        $user->category = $category;
        $user->date = $date;
        $user->practicing = $practicing;
        $user->photo = isset($profile) ? $profile : $user->photo;
        $user->regNumber = $newId;
        $user->diplome = isset($diploma) ? $diploma : $user->diplome;
        $user->email = $email;
        $user->save();
        
        $phone = Phonenumber::where('user_id',$user->id)->where('name','mobile');
        if($phone){
            $phone->delete();
        }
        
        Phonenumber::create([ 'user_id'=>$user->id, 'name' => 'mobile', 'phone' => $request->phone]);
        // if($exEmail !== $request->email){
        //     (new NotifyController)->newEmail($email);
        //     (new NotifyController)->changedEmail();
        // }
        return back()->with('message','User updated!');
    }


    public function changeStatus(Request $request, User $user)
    {
        $this->validate($request,[
            'status' => 'required',
            'date' => 'required',
            'practicing' => 'required',
        ]);
        $user = User::findorfail($user->id);

        $date = strtotime($request->date);
        $staff = User::where('category','Staff')->count();
        $advocate = User::where('category','Advocate')->count();
        $ons = $advocate < 10 ? '0' : ''; 
        $hun = $advocate < 100 ? '0' : ''; 
        $id = $hun.$ons.$advocate+1;
        $status = intval($request->status) < 3 ? 1 : 0;
        $year = $status ? date('Y', $date) : date('y', $date);
        $start = $status ? $id : 'RSTA';
        $middle = $status ? (intval($request->status) == 1 ? 'T' : 'S') : $staff+1;
        $idNumber = $start.'/'.$middle.'/'.$year;
        $newId = $user->regNumber;
        $category = $status ? 'Advocate' : 'Staff';
        $practicing = !$status ? '1' : ($request->practicing == 1 ? 2 : $request->practicing);

        if($category == $user->category ){
            if($user->status != $request->status){
                if($category == 'Advocate'){
                    $exId = explode('/',$user->regNumber);
                    $newId = $exId[0].'/'.$middle.'/'.$exId[2];
                }
            }
            elseif($user->date->format('Y') !== date('Y', $date)){
                $exId = explode('/',$user->regNumber);
                $newId = $exId[0].'/'.$exId[1].'/'.$year;
            }
        }
        elseif($category !== $user->category){
            $newId = $idNumber;
        }

        $user->status = $request->status;
        $user->category = $category;
        $user->date = $date;
        $user->practicing = $practicing;
        $user->blocked = $practicing == '5' ? true : $user->blocked;
        $user->regNumber = $newId;
        $user->save();
        return back()->with('message','User status updated!');
    }

    public function activate(Request $request)
    {
        $this->validate($request,[
            'express' => 'required',
        ]);

        $user = User::where('id',$request->express)->withTrashed()->first();
        $user->blocked = false;
        $user->deleted_at = NULL;
        $user->save();
        if (!$request->expectsJson()) {
          return back()->with('message','User activated successfully!');
        }
        else{
            return response()->json([
                'success' => true,
            ]);
        }
    }

    public function destroy(Request $request, User $user)
    {
        $user = User::findorfail($user->id);
        $user->blocked = true;
        $user->save();
        $user->delete();
        if (! $request->expectsJson()) {
          return back()->with('message','User deactivated successfully!');
        }
        else{
            return response()->json([
                'success' => true,
            ]);
        }
    }


}
