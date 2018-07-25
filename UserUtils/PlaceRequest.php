<?php
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
        //user not logged in

        $goto = "Location: ../Login.php?next=PlaceRequest.php?bookid=" . $_GET['bookid'];
        $_SESSION['msg'] = "<div class='uifixes'><p style='color:red'>You must first log in to place a hold on a book</p></div>";
        header($goto);
    }
    unset($_SESSION['next']);
    include("../Assets/Header.php");
    include('../SQLUtils/GetConnection.php');




?>

<!DOCTYPE html>

<html>
<head>
    <title>Place Request</title>
    <link rel="stylesheet" type="text/css" href="../Assets/main.css">
</head>
<body>
<div class="uifixes">
    <?php

    $bookid = $_GET['bookid'];




    $username = $_SESSION['username'];

    $conn = getDefaultConnection();
    $query = "SElECT * FROM Users WHERE username=\"".$username."\"";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()){
        $userid = $row['id'];
    }

    $date_arr = getdate();
    $date = $date_arr['year']."-".$date_arr['mon']."-".$date_arr['mday'];
    //echo ($date);


    $insert_request_query = "INSERT INTO Requests(bookid, userid, date_out, status) VALUES(".$bookid.",".$userid.",\"".$date."\",".getBookStatus($conn, $bookid).")";
    //echo $insert_request_query;
    $conn->query($insert_request_query);
    echo "<p class='title'>Your request has been placed.</p>";

    function getBookStatus($conn, $bookid){
        $query = "SELECT * FROM ItemsOut WHERE bookid=".$bookid;
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()){
            if (isset($row['bookid'])){
                return 1;
            }
        }
        return 0;
    }

    ?>

    <a href="../UserAccount/Overview.php"><button class="rounded navbtn">View Account Overview &rightarrow;</button></a><br><br>
    <a href="../UserAccount/Requests.php"><button class="rounded navbtn">View Requests List &rightarrow;</button></a><br><br>
</div>

</body>
</html>