<?php
    //renew a book -> from request id

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require("Book.php");

    $itemout_id = $_GET['id'];

    $book = new Book($itemout_id);


    echo "bookid: ".$book->getBookid();
    echo "<br>datedue: ".$book->getDateDue();
    echo "<br>dateout: ".$book->getDateOut();
    echo "<br>id: ".$book->getId();
    echo "<br>prevrenewal: ".$book->getPreviousRenewal();
    echo "<br>renremaining: ".$book->getRenewalsRemaining()."<br>";


    $result = $book->renew();

    if ($result == "limitreached"){
        $_SESSION['msg'] = "<p class='title' style='color:red'>The book cannot be renewed anymore. The limit of renewals has been reached.</p>";
        header("Location: /FVLibraryWebClient/UserAccount/ItemsOut.php");
    }
    else {
        $_SESSION['msg'] = "<p class='title' style='color:green'>The book was renewed successfully.</p>";
    }



    header("Location: /FVLibraryWebClient/UserAccount/ItemsOut.php");