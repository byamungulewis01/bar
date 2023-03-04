<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contribution;
use Illuminate\Http\Request;
use App\Models\ContributeAdvocate;
use App\Http\Controllers\Controller;

class ContributionController extends Controller
{
    public function index()
    {
        $contributions = Contribution::all();
       return view('finance.index', compact('contributions'));
    }
    public function store(Request $request)
    {
        $formField = $request->validate([
            'name' => 'required',
            'start_period' => 'required',
            'end_period' => 'required',
            'deadline' => 'required',
            'amount' => 'required',
            'percentage' => 'required',
            'concern' => 'required',
        ]);
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $yearInBar = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;
        $concern = implode(',', $request->concern);
        $formField['yearInBar'] = $yearInBar;
        $formField['concern'] = $concern;
        $formField['createdBy'] = auth()->guard('admin')->user()->id;

        Contribution::create($formField);

        return back()->with('message', 'Contribution Added');
    
    }

    public function user_contribute(Request $request)
    {
        $formField = $request->validate([
            'transction_type' => 'required',
            'reference_no' => 'required|unique:contribute_advocates,reference_no',
            'transction_date' => 'required|date',
            'amount' => 'required',
        ]);
        $formField['contribution'] = $request->contribution;
        $formField['advocate'] = $request->advocate;
        ContributeAdvocate::create($formField);
        
        return back()->with('message', 'Contribution Added');
    
    }
}
