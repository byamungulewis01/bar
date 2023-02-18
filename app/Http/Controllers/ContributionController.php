<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use Illuminate\Http\Request;

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
    
        $concern = implode(',', $request->concern);
        $formField['concern'] = $concern;
        $formField['createdBy'] = auth()->guard('admin')->user()->id;

        Contribution::create($formField);

        return back()->with('message', 'Contribution Added');
    
    }
}
