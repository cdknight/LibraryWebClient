<?php
include('../Assets/Header.php');
include('../SQLUtils/GetConnection.php');
session_start();
if (!isset($_SESSION['username'])){
    //not logged in, dump at Login page to log in <i>with</i> msg
    $_SESSION['msg'] = "<div class='uifixes'><p style='color=red'>You must log in first in order to view your requests.</p></div>";
    header("Location: ../Login.php");
}
?>



<!DOCTYPE html>

<html>
<head>
    <title>Overview</title>
    <link rel="stylesheet" type="text/css" href="../Assets/tables.css">
</head>
<body>
<div class="uifixes">
    <h1 class="title">Requests</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
        unset($_SESSION['msg']);
    }
    $conn = getDefaultConnection();
    $query = "SELECT * FROM Users WHERE username=\"".$_SESSION['username']."\"";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()){
        $userid = $row['id'];
    }



    $result = $conn->query("SELECT * FROM Requests WHERE userid=".$userid);
    $status_string = "";
    if ($result->num_rows == 0){
        echo "<p class='title'>There are no requests! Press Search at the left to find a book and place a hold on it.</p>";
        echo "<a href='/FVLibraryWebClient/Search/Search.php'><button class='rounded navbtn'>Search</button></a>";
        die();
    }
    echo "<table class='regularTable'>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Date Requested:</th>";
    echo "<th>Status</th>";
    echo "<th>Cancel</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        if ($row['status'] == 0){
            $status_string = "The item is processing for pickup";
        }
        elseif ($row['status'] == 1){
            $status_string = "The item is checked out";
        }
        elseif ($row[status] == 2){
            $status_string = "The item is ready for pick up";
        }
        echo "<td><a class='title' href='../BookPage.php?id=".$row['bookid']."'>".getBookTitleFromId($conn, $row['bookid'])."</a></td>";
        echo "<td><p class='title'>".$row['date_out']."</p></td>";
        echo "<td><p>$status_string</p></td>";
        echo "<td><a class='nonlink' href='../UserUtils/CancelRequest.php?id=".$row['id']."'><button class='rounded navbtn'>Cancel Request</button><br></td>";
        echo "</tr>";

    }
    echo "</table>";

    function getBookTitleFromId($conn, $id){
        $result = $conn->query("SELECT Title FROM Books WHERE ID=".$id);
        while ($row = $result->fetch_assoc()){
            return $row['Title'];
        }
    }
    ?>
</div>

</body>
</html>
