<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'areas' => 'required',
        ]);

        $user = auth()->user();
        $user->areas()->delete();
        foreach($request->areas as $area){
            $user->areas()->create(['lawscategory_id' => $area]);
        }
        
        return back()->with('message','Practice area added!');
    }
}
