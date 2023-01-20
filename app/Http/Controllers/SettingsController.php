<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marital;

class SettingsController extends Controller
{
    public function index()
    {
        $marital = marital::all();
        return view('settings',[
            'marital' => $marital
        ]);
    }
}
