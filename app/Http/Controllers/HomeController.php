<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        return view('home', [
                            ]);
    }
}