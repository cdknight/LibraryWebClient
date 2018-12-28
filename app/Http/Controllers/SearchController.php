<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Book;

class SearchController extends Controller
{
    public function quickSearch(Request $request) {
        // A *very* simple search function that searches by title.
        // search_term is the search parameter.

        $search_term = $request->input('search_term');

        // The search term cannot be blank

        if ($search_term == "") {

            return redirect("")->with("msg", "Your search term cannot be blank!");


        }

        $books_matching_query = Book::where('Title', 'LIKE', "%$search_term%")->paginate(9);

        return view("search.quick", [
            "books_found" => $books_matching_query,
            "search_term" => $search_term
        ]);
    }
}
