<?php
    require_once( $_SERVER['DOCUMENT_ROOT'] . "/FVLibraryWebClient/SQLUtils/GetConnection.php");

    function getBookId($bookid){
        return $bookid;
    }

    function getBookTitle($bookid){
        $q = "SELECT Title FROM Books where id=$bookid";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        while ($row = $result->fetch_assoc()){
            return $row['Title'];
        }
    }

    function getBookAuthor($bookid){
        $q = "SELECT Author FROM Books where id=$bookid";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        while ($row = $result->fetch_assoc()){
            return $row['Author'];
        }
    }

    function getBookLink($bookid, $sQuery){
        return "/FVLibraryWebClient/BookPage.php?id=$bookid&squery=$sQuery";
    }

    function getBookCheckedOutDate($bookid){
        $q = "SELECT date_out FROM ItemsOut where bookid=$bookid";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        if ($result ->num_rows == 0){
            return false;
        }

        while ($row = $result->fetch_assoc()){
            return $row['date_out'];
        }
    }

    function getBookCheckedOutDueDate($bookid){
        $q = "SELECT date_due FROM ItemsOut where bookid=$bookid";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        if ($result ->num_rows == 0){
            return false;
        }

        while ($row = $result->fetch_assoc()){
            return $row['date_due'];
        }
    }

    function getBookMissing($bookid){
        $q = "SELECT Missing FROM Books where id=$bookid";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        while ($row = $result->fetch_assoc()){
            return $row['Missing'];
        }
    }

    function getBookGenre($bookId){
        $q = "SELECT Genre FROM Books where id=$bookId";
        $conn = getDefaultConnection();
        $result = $conn->query($q);

        while ($row = $result->fetch_assoc()){
            return $row['Genre'];
        }
    }
