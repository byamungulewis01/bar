<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\marital;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['storeAdminPwd','storeUserPwd','adminPwd','userPwd']);
        $this->middleware('adminauth')->only(['storeAdminPwd','adminPwd']);
        $this->middleware('auth')->only(['storeUserPwd','userPwd']);
    }
    
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $admin = Admin::where($fieldType,$request->username)->first();
        $user = User::where($fieldType,$request->username)->first();
        if($admin){
            if($admin->blocked){
                return back()->with('status','Your account is locked, please contact system administrator');
            }
            if(!auth()->guard('admin')->attempt(array($fieldType => $input['username'], 'password' => $input['password']), $request->remember_me)){
                throw ValidationException::withMessages([
                    'name' => 'Invalid Login Credentials'
                ]);
                return back()->with('status','Invalid Login Credentials');
            }
            if($admin->created_at == $admin->updated_at){
                return redirect()->route('changePassword');
            }
            return redirect()->route('admin.dashboard');
        }
        elseif($user){
            if($user->blocked){
                return back()->with('status','Your account is locked, please contact system administrator');
            }
            elseif(!auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']), $request->remember_me)){
                throw ValidationException::withMessages([
                    'name' => 'Invalid Login Credentials'
                ]);
                return back()->with('status','Invalid Login Credentials');
            }
            if($user->created_at == $user->updated_at){
                return redirect()->route('newPassword');
            }
            return redirect()->route('dashboard');
        }
        else{
            throw ValidationException::withMessages([
                'name' => 'Invalid Login Credentials'
            ]);
            return back()->with('status','Invalid Login Credentials');
        }
    }

    public function userPwd()
    {
        return view('auth.newpassword');
    }

    public function adminPwd()
    {
        return view('auth.newpassword');
    }

    public function storeUserPwd(Request $request)
    {   

        $validator = $this->validate($request, [
            'current' => 'required',
            'password' => 'required|confirmed',
        ]);

        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        $password = $user->password;

        $verified = Hash::check($request->password, $password);  
        if($verified){
            return back()->with('invalid','Current Password and new password can not be the same');
        } 

        $verified = Hash::check($request->current, $password);  
        if(! $verified){
            return back()->with('invalid','Invalid Password, Check password in email');
        }   

        if($request->password_confirmation != $request->password){
            return back()->with('invalid','Password and Confirm password does not match');
        } 

        $user->password = Hash::make($request->password);
        $user->save();
        auth()->logout();
        return redirect()->route('login')->with('reseted', 'Password changed! sign in to continue');
    }

    public function storeAdminPwd(Request $request)
    {   

        $validator = $this->validate($request, [
            'current' => 'required',
            'password' => 'required|confirmed',
        ]);

        $email = auth()->user() ? auth()->user()->email : auth()->guard('admin')->user()->email;
        $user = Admin::where('email', $email)->first();
        $user = !$user ? User::where('email', $email)->first() : $user;

        $password = $user->password;

        $verified = Hash::check($request->password, $password);  
        if($verified){
            return back()->with('invalid','Current Password and new password can not be the same');
        } 

        $verified = Hash::check($request->current, $password);  
        if(! $verified){
            return back()->with('invalid','Invalid Password, Check password in email');
        }   

        if($request->password_confirmation != $request->password){
            return back()->with('invalid','Password and Confirm password does not match');
        } 

        $user->password = Hash::make($request->password);
        $user->save();
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        auth()->logout();
        return redirect()->route('login')->with('reseted', 'Password changed! sign in to continue');
    }
}
