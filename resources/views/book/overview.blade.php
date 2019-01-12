@extends("layouts.base")

@section('title', $book->Title)


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl">



      <h1 class="display-4">{{ $book->Title }}</h1>
      
      <p class="lead"><b>Written By:</b> {{ $book->Author }}</p>
      <p class="lead"><b>Genre:</b> {{ $book->Genre }}</p>

      @if ( $book->CheckedOut )
      <p class="lead"><b>Note: </b>This item is checked out.</b>
@endif

   @if ( $book->Missing )
       <p class="lead"><b>Note: </b>This item is missing.</p>
   @endif


   @if ( isset($book->bookInformation) )

       <h3>Book Information</h3>
       
       <ul class="list-group">

	 {{--- In the following, we check if the corresponding properties are set for a book and display them if they are. Not all books have a full entry in the database. ---}}
	 @if ( isset($book->bookInformation->description) )
	    <li class="list-group-item">
              <b>Description</b>: {{ $book->bookInformation->description }}
	    </li>
	 @endif

         @if ( isset($book->bookInformation->publisher) )
	    <li class="list-group-item">
	      <b>Publisher</b>: {{ $book->bookInformation->publisher}}
	    </li>
	 @endif

         @if ( isset($book->bookInformation->isbn) )
	    <li class="list-group-item">
              <b>ISBN Number</b>: {{ $book->bookInformation->isbn}}
	    </li>
	 @endif

         @if ( isset($book->bookInformation->publication_date) )
	    <li class="list-group-item">
              <b>Publication Date</b>: {{ $book->bookInformation->publication_date}}
	    </li>
	 @endif

       </ul>
       
   @endif

</div>

<div class="float-right">
  <ul class="list-group">
    <li class="list-group-item"><h2>Actions</h2></li>
    <li class="list-group-item"><button class="btn btn-success">Place Hold</btn></li>
    <li class="list-group-item"><button class="btn btn-warning">Contribute Feedback</btn></li>
  </ul>
</div>
  {{--- Actions list group ---}}

</div>
       
</div>
    

    
      
@endsection
