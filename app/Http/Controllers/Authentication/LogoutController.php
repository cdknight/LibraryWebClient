<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function doLogout(Request $request) {
        // Unset session variables

        $request->session()->put('authenticated', false);
        $request->session()->forget('user');


        // Redirect home.

        return redirect('')->with('msg', "Logged out successfully.");
    }
}
