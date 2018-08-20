<?php session_start();
require("Assets/Header.php");
require("BookUtils/BookData.php");
if (!isset($_SESSION['recent_book_list'])){
    $_SESSION['recent_book_list'] = array();
}
require_once("SQLUtils/GetConnection.php");


?>

<!DOCTYPE html>

<html>
<head>
    <title><?php getBookTitle($_GET['id'])?></title>
    <link rel="stylesheet" type="text/css" href="Assets/main.css">
</head>
<body>


<div class="uifixes">
    <?php
    array_push($_SESSION['recent_book_list'], $_GET['id']);
    $conn = getDefaultConnection();
    $query = "SELECT * FROM Books WHERE ID=".$_GET['id'];
    $result = $conn->query($query);


    while ($row = $result->fetch_assoc()){
        $author = $row["Author"];
        $title = $row["Title"];
        $genre = $row["Genre"];
        $notes_checkedout = $row["Notes1"];
        $notes_missing = $row["Notes2"];
    }

    echo "<h1 class='title'>".$title."</h1>";
    echo "<p>Author: ".$author."</p>";
    echo "<p>Genre: ".$genre."</p>";
    if ($notes_checkedout){
        echo "<p>This book was checked out on: ".$notes_checkedout."</p>";
    }
    else{
        echo "<p>This book has not been checked out.</p>";
    }

    if ($notes_missing){
        echo "<p>This book has been reported as missing! You will not be able to check this book out.</p>";
    }
    if ($_SESSION['previous'] == "advancedsearch"){
        echo "<a href=\"Search/AdvancedSearch.php\"><button class=\"rounded navbtn\">Go Back to Advanced Search &leftarrow;</button></a><br><br>";
        echo "<a href=\"index.php\"><button class=\"rounded navbtn\">Go Home &leftarrow;</button></a><br><br>";
        echo "<a href='UserUtils/PlaceRequest.php?bookid=".$_GET['id']."'><button class='rounded navbtn'>Place Request on Book &rightarrow;</button></a>";
    }
    else {
        echo "<a href='Search/SearchResults.php?query=".$_GET['squery']."'><button class='rounded navbtn'>Go Back to Search Results &leftarrow;</button></a><br><br>";
        echo "<a href=\"Search/Search.php\"><button class=\"rounded navbtn\">Go Back to Search &leftarrow;</button></a><br><br>";
        echo "<a href=\"index.php\"><button class=\"rounded navbtn\">Go Home &leftarrow;</button></a><br><br>";
        echo "<a href='UserUtils/PlaceRequest.php?bookid=".$_GET['id']."'><button class='rounded navbtn'>Place Request on Book &rightarrow;</button></a>";
    }
    ?>
    </div>

</body>
</html>
