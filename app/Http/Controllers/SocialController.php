<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'social' => 'required',
            'link' => 'required',
        ]);

        $user = auth()->user();
        $user->socials()->create(['social' => $request->social, 'link' => $request->link]);

        return back()->with('message','Social media added!');
    }

    public function destroy(Request $request)
    {
        $this->validate($request,[
            'social' => 'required',
        ]);

        $user = auth()->user();
        $user->socials()->where('social',$request->social)->delete();

        return back()->with('message','Social media deleted!');
    }
}
