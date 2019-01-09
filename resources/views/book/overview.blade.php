@extends("layouts.base")

@section('title', $book->Title)


@section('content')

    <h1>{{ $book->Title }}</h1>
        
    <p>{{ $book->Author }}</p>
    <p>Genre: {{ $book->Genre }}</p>

   @if ( $book->CheckedOut )
     <p>This item is checked out.</b>
   @endif 

   @if ( $book->Missing )
       <p>This item is missing.</p>
   @endif

   @if ( isset($book->bookInformation) )

       @if ( isset($book->bookInformation->description) )
        <b>Description</b>: {{ $book->bookInformation->description }}

       @endif
       
   @endif 
      
@endsection
