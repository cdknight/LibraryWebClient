<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

use App\User;

class LoginController extends Controller
{
    public function show() {
        return view('authentication.login');
    }

    public function doLogin(Request $request) {
        // Try to authenticate based on POST parameters

        info('This is some useful information.');

        $username = $request->input("username");
        $password = $request->input("password");

        // Retrieve the user.

        $user = User::where('username', $username)
                            ->first();

        // If the user doesn't exist, redirect them back to the log in page.

        if ($user == null) {

            $request->session()->put('authenticated', false);
            return redirect('login')->with('msg', "Couldn't log in!");
        }

        // Check if the user is authenticated.

        $authenticated = $user->auth($password);


        // Now set session and redirect if authed or flash and go back to login page.

        if ($authenticated) {

            $request->session()->put('authenticated', true);
            $request->session()->put('user', $user); // We need the user to be available for reading and writing to later.

            return redirect('')->with('msg', 'Logged in succesfully.');

        }

        else {

            $request->session()->put('authenticated', false);
            return redirect('login')->with('msg', "Couldn't log in!");


        }


    }
}
