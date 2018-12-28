<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\RedirectResponse;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // We check first if the user is authenticated and as an extra measure if the user actually exists in the session.

        if ($request->session()->get("authenticated")){
            if ($request->session()->get("user")) {

                // Refresh the user

                $request->session()->get("user")->refresh();

                return $next($request); // Proceed!

            }
            else {
                // Something went wrong here. Let's log the user out before worse happens.

                return redirect('/logout');

            }

        }


        return redirect("/login")->with("msg", "You need to log in first!"); // The user is not logged in.

    }
}
