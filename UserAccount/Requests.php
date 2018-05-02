<?php
include('../Assets/Header.php');
session_start();
if (!isset($_SESSION['username'])){
    //not logged in, dump at Login page to log in <i>with</i> msg
    $_SESSION['msg'] = "<p style='color=red'>You must log in first in order to view your requests.</p>";
    header("Location: ../Login.php");
}
?>



<!DOCTYPE html>

<html>
<head>
    <title>Overview</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<div class="uifixes">
    <h1 class="title">Requests</h1>
    <?php
    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    $query = "SELECT * FROM Users WHERE username=\"".$_SESSION['username']."\"";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()){
        $userid = $row['id'];
    }



    $result = $conn->query("SELECT * FROM Requests WHERE userid=".$userid);
    $status_string = "";
    while ($row = $result->fetch_assoc()){
        if ($row['status'] == 0){
            $status_string = "The item is processing for pickup";
        }
        elseif ($row['status'] == 1){
            $status_string = "The item is checked out";
        }
        elseif ($row[status] == 2){
            $status_string = "The item is ready for pick up";
        }

        echo "<a href='../BookPage.php?id=".$row['bookid']."'>".getBookTitleFromId($conn, $row['bookid'])."</a><p style='display:inline'>&emsp;Request placed on: ".$row['date_out']."&emsp;Status: ".$status_string."</p><br>";
    }


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
