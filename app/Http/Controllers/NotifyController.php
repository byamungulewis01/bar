<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAccount;
use App\Mail\NewOrganization;
use App\Mail\resetPassword;
use App\Mail\NewEmail;
use App\Mail\ChangedEmail;

class NotifyController extends Controller
{
    public $message;
    public $subject;
    public $user;
    public $key;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function newAccount($email,$password){
        Mail::to($email)->send(new NewAccount($email,$password,));
    }

    public function newOrganization($email,$password){
        Mail::to($email)->send(new NewOrganization($email,$password,));
    }

    public function newEmail(){
        Mail::to($email)->send(new NewEmail($email));
    }

    public function changedEmail(){
        Mail::to($email)->send(new ChangedEmail());
    }

    public function reset($key,$email){
        Mail::to($email)->send(new resetPassword($key,$email));
    }
}
