<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../Assets/Header.php');
require('../SQLUtils/GetConnection.php'); //includes stay here since session is used after this.

if (!isset($_SESSION['username'])) {
    //user not logged in
    $_SESSION['msg'] = "<div class='uifixes'><p style='color:red'>You must log in first in order to view your checked-out items</p></div>";
    header("Location: ../Login.php");
}


?>
<!DOCTYPE html>

<html>
<head>
    <title>Items Out</title>
    <link rel="stylesheet" type="text/css" href="../Assets/tables.css">
</head>
<body>
<div class="uifixes">
    <h1 class="title">Items Out</h1>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <table class="regularTable">


    <?php
    $conn = getDefaultConnection();
    //echo "userid: " + getUserIdFromName($conn, $_SESSION['username']);

    $query = "SELECT * FROM ItemsOut WHERE userid=".getUserIdFromName($conn, $_SESSION['username']);
    //echo "<br>".$query;
    $result = $conn->query($query);
    if ($result->num_rows == 0){
        echo "<p class='title'>You haven't checked any books out yet!<br>Go to the library, find, and ask your librarian to check out the book.<br>Or, find a book online with the Search button and ask your librarian to check out the book.";
        die();
    }


    echo "<tr>
            <th>Title</th>
            <th>Checked Out</th>
            <th>Due Date</th>
            <th>Renewals Remaining</th>
            <th>Renew</th>
        </tr>";

    while ($row = $result->fetch_assoc()){
        $checkedout = $row['date_out'];
        $due_date = $row['date_due'];
        $renewals = $row['renewals_remaining'];

        echo "<tr>";
        echo "<td><a href='../BookPage.php?id=".$row['bookid']."'>".getBookTitleFromId($conn, $row['bookid'])."</a></td>";
        echo "<td><p class='title'>$checkedout</p>";
        echo "<td><p class='title'>$due_date</p>";
        echo "<td><p class='title'>$renewals</p>";
        if ($renewals == 0){
            echo "<td><button class='rounded navbtn noRenew' disabled>Renew Book</button>
                <span id='noRenewTooltip'>The maximum number of renewals for this book has been reached.</span>
            <br></td>";
        }
        else {
            echo "<td><a class='nonlink' href='../UserUtils/ItemsOut/RenewBook.php?id=".$row['id']."'><button class='rounded navbtn'>Renew Book</button><br></td>";
        }

        echo "</tr>";
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
    </table>
</div>


</body>
</html>