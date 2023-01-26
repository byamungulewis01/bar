<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('adminauth');
    }

    public function index()
    {
        return view('dashboards.admin');
    }
    
}
