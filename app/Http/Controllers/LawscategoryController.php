<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawscategory;

class LawscategoryController extends Controller
{
    public function index(Request $request)
    {
      $data = Lawscategory::all();
        if (! $request->expectsJson()) {
            return $data;
        }
        else{
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        Lawscategory::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        return back()->with('message','Law category status added!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'token' => 'required'
        ]);
        $lawcat = Lawscategory::findorfail($request->token);
        $lawcat->title = $request->title;
        $lawcat->description = $request->description;
        $lawcat->save();
        return back()->with('message','Law category updates');
    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $lawcat = Lawscategory::findorfail($request->token);
        $lawcat->delete();
        return back()->with('message','Law category Deleted');
    }
}
