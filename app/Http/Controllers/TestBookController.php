<?php

namespace App\Http\Controllers;


class TestBookController extends Controller
{
    /**
     * Random test book controller
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $bookstr = "";

        $book_info= \App\Book::find($id)->bookInformation;

        $bookstr = $book_info->isbn;

        return $bookstr;
    }
}

