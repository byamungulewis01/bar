<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        auth()->guard('web')->logout();
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }
}
