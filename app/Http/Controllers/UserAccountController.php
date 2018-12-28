<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function dashboard(Request $request){
        return view('useraccount.dashboard',
            [
                'user' => $request->session()->get("user")

            ]);
    }

    public function requests(Request $request){
        return view('useraccount.requests',
            [
                'user' => $request->session()->get("user")

            ]);
    }
}
