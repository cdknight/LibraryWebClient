<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookInformationController extends Controller
{
    public function bookPage($id) {


        $book = Book::find($id);

        return view("book.overview", [
            "book" => $book
        ]);
        
    }
}
