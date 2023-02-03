<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'address' => 'required'
        ]);

        $user = auth()->user();

        Address::create([ 'user_id'=>$user->id, 'title' => $request->title, 'address' => $request->address]);

        return back()->with('message','Address added!');
    }

    public function destroy(Address $address)
    {
        $address = Address::findorfail($address->id);
        $address->delete();
        
        return back()->with('message','Address deleted successfully!');
    }
}
