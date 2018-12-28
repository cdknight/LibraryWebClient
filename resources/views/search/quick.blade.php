
@extends('layouts.base')
@section('title', "User Summary")


@section('content')


    <h1 class="mb-4">Search Results for Term: "{{ $search_term }}"</h1>

    <div class="container-fluid">

        @if (count($books_found) == 0)
            <p class="alert alert-danger">Sorry, no search results were found.</p>


        @else

            @foreach ($books_found->chunk(3) as $book_chunks)
                <div class="row mb-4">
                    @foreach ($book_chunks as $book)


                            @component("components.books.book_card", ["book" => $book])

                            @endcomponent


                    @endforeach
                </div>
            @endforeach

            <div class="row">
                {{ $books_found->appends(['search_term'=>$search_term])->links() }}
            </div>

        @endif
    </div>




@endsection

