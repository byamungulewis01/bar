<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\marital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('adminauth');
    }

    public function index()
    {
        $marital = marital::all();
        $allUsers = User::all()->count();
        $activeUsers = User::where('practicing','<=',2)->count();
        $inactiveUsers = User::where('practicing',3)->count();
        $suspendedUsers = User::where('practicing',4)->count();
        $struckoffUsers = User::where('practicing',5)->count();
        $deseacedUsers = User::where('practicing',6)->count();
        return view('dashboards.admin',compact('marital','allUsers','activeUsers','inactiveUsers','suspendedUsers','struckoffUsers','deseacedUsers'));
    }
    
}
