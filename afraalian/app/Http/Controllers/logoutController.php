<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json('logout', 201);
    }


}
