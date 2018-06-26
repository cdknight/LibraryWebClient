<?php
session_start();
if (!isset($_SESSION['username'])) {
    //user not logged in
    $_SESSION['msg'] = "<div class='uifixes'><p style='color:red'>You must log in first in order to view your checked-out items</p></div>";
    header("Location: ../Login.php");
}
include('../Assets/Header.php');
?>
<!DOCTYPE html>

<html>
<head>
    <title>Items Out</title>
    <link rel="stylesheet" type="text/css" href="../Assets/main.css">
</head>
<body>
<div class="uifixes">
    <h1 class="title">Items Out</h1>
    <?php
    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    //echo "userid: " + getUserIdFromName($conn, $_SESSION['username']);
    $query = "SELECT * FROM ItemsOut WHERE userid=".getUserIdFromName($conn, $_SESSION['username']);
    //echo "<br>".$query;
    $result = $conn->query($query);
    if ($result->num_rows == 0){
        echo "<p class='title'>You haven't checked any books out yet!<br>Either go to the library, find, and ask your librarian to check out the book, or find a book online with the Search button and ask your librarian to check out the book.";
    }
    while ($row = $result->fetch_assoc()){
        echo "<a href='../BookPage.php?id=".$row['bookid']."'>".getBookTitleFromId($conn, $row['bookid'])."</a><br>";
    }


    function getUserIdFromName($conn, $name){
        $result = $conn->query("SELECT id FROM Users WHERE username=\"".$name."\"");
        while ($row = $result->fetch_assoc()){
            return $row['id'];
        }

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