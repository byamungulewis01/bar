<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Probono;

class ProbonoController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('probono.index', compact('users'));
    }

    public function api(Request $request)
    {
      $data = Probono::latest();
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
}
