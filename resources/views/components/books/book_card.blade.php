<div class="card mr-4 " style="width: 20rem;">

    <div class="card-body">

        <h5 class="card-title">{{ $book->Title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $book->Author }}</h6>

        <div class="card-text">
            @if (isset($book->bookInformation))
                <p> {{ $book->bookInformation->description }} </p>

	    @endif

		<div class="container row">
		  <a href="/book/info/{{ $book->ID }}" class="mr-1">More Information</a>
                </div>

        </div>

    </div>

</div>
