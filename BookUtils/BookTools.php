<?php


    require_once("BookData.php");

    function generateBookCard($bookId, $searchQuery){

        $title = getBookTitle($bookId);
        $author = getBookAuthor($bookId);
        $missing = getBookMissing($bookId);
        $genre = getBookGenre($bookId);

        $checkedOutDate = getBookCheckedOutDate($bookId);
        $bookDueDate = getBookCheckedOutDueDate($bookId);

        $bookLink = getBookLink($bookId, $searchQuery);



        $finalCardString = "";
        $finalCardString .= "<div class='card bookCard' id='book$bookId'>";

        $finalCardString .= "<div class='mainBookInfo'>";

        $finalCardString .= "<h2 id='bookTitle' class='title'>$title</h2>";
        $finalCardString .= "<h4 id='bookAuthor' class='title'>By $author</h4>";
        $finalCardString .= "<a href='$bookLink' id='bookLink' class='title'>View Details</a>";

        $finalCardString .= "</div>";

        $finalCardString .= "<div class='bookLinks'>";

        $finalCardString .= "<a href='/FVLibraryWebClient/UserUtils/PlaceRequest.php?bookid=$bookId'><button class='rounded navbtn'>Place Request</button></a><br>";
        $finalCardString .= "<button class='largeText tooltipButton round navbtn bookInfoExpand' data-book-showing='false' data-book-id='$bookId'>+</button>    <span id='span$bookId' class='tooltipSpan'>View more information about the book</span>";

        $finalCardString .= "</div>";

        $finalCardString .= "<div id='extraBookInfo$bookId' class='extraBookInfo'>";

        $finalCardString .= "<p class='title' id='bookGenre'>Genre: $genre</p>";

        if ($missing){
            $finalCardString .= "<p class='title' id='bookMissingStatus'>This book is missing.</p>";
        }
        else {
            $finalCardString .= "<p class='title' id='bookMissingStatus'>This book is not missing.</p>";
        }

        if ($checkedOutDate != false){
            $finalCardString .= "<p class='title' id='checkedOutDate'>The book was checked out on $checkedOutDate.</p>";
            $finalCardString .= "<p class='title' id='bootDueDate'>The book is due on $bookDueDate.</p>";
        }





        $finalCardString .= "</div>";


        $finalCardString .= "</div>";







        return $finalCardString;

    }



