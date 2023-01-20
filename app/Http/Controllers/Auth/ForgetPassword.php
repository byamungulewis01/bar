<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\NotifyController;
use Illuminate\Support\Facades\Hash;

class ForgetPassword extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.forget');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $user = Admin::where('email',$request->email)->first();
        if(!$user){
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return back()->with('notexist','Email address you provided is not registered!');
            }
        }

        $arr = explode('/',$user->password);
        $arr = implode("",$arr);
        $arr = explode('$',$arr);

        $email = $user->email;
        $key = implode("",$arr);
        (new NotifyController)->reset($key, $email);

        return redirect()->route('password.emailSent')->with('sentEmail', $email);
    }

    public function emailSent()
    {
        return view('auth.sent');
    }

    public function check(Request $request)
    {
        $key = $request->query('key');
        $email = $request->query('userId');
        $user = Admin::where('email', $email)->first();
        $user = !$user ? User::where('email', $email)->first() : $user;
        if(!$key || !$email || !$user){
            return redirect()->route('password.checkFailed')->with('checkFailed', $email);
        }

        $password = $user->password;
        $arr = explode('/',$password);
        $arr = implode("",$arr);
        $arr = explode('$',$arr);
        $newKey = implode("",$arr);

        if($key !== $newKey){
            return redirect()->route('password.checkFailed')->with('checkFailed', $email);
        }

        return view('auth.reset');
    }

    public function checkPassword(Request $request)
    {   

        $key = $request->query('key');
        $email = $request->query('userId');
        $user = Admin::where('email', $email)->first();
        $user = !$user ? User::where('email', $email)->first() : $user;

        if(!$key || !$email || !$user){
            return redirect()->route('password.checkFailed')->with('checkFailed', $email);
        }

        $password = $user->password;
        $arr = explode('/',$password);
        $arr = implode("",$arr);
        $arr = explode('$',$arr);
        $newKey = implode("",$arr);

        if($key !== $newKey){
            return redirect()->route('password.checkFailed')->with('checkFailed', $email);
        }

        $validator = $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('reseted', 'Password changed! sign in to continue');
    }

    public function checkFailed()
    {
        return view('auth.checkFailed');
    }

}
