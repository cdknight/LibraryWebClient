<?php
session_start();
if (empty($_GET["query"])){
    $_SESSION['msg'] = "<p style='color:red' id='msg' class='title'>Please enter a search term.</p>";
    header("Location: /FVLibraryWebClient/Search/Search.php");
}


include("../Assets/Header.php");
include("../SQLUtils/GetConnection.php");
require_once("../BookUtils/BookTools.php")
?>

<!DOCTYPE html>

<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="../Assets/main.css">
</head>
<body>
<div class="uifixes">
    <?php

    $conn = getDefaultConnection();
    $query = "SELECT * FROM Books WHERE Author LIKE '%".$_GET['query']."%' OR Title LIKE '%".$_GET['query']."%' OR Genre LIKE '%".$_GET['query']."%' OR CheckedOut LIKE '%".$_GET['query']."%' OR Missing LIKE '%".$_GET['query']."%'";
    $result = $conn->query($query);
    ?>
    <h1 class="title">Search Results</h1>
    <div class="cardList">


    <?php

    while($row = $result->fetch_assoc()){
        $id = $row['ID'];
        echo generateBookCard($id, $_GET['query']);
        //echo "<div class='card bookCard'>";
        //echo "<a href=\"../BookPage.php?id=".(string)$id."&squery=".$_GET["query"]."\">".$row['Title']." </a><p class='inlineParagraph contentText'>&emsp;&emsp;Author: ".$row['Author']."</p><br><br>";
        //echo "</div>";

    }
    if ($result->num_rows == 0){
        echo "<p class='title'>Sorry, but there were no search results for this term.</p>";
        echo "<a href='/FVLibraryWebClient/Search/Search.php'><button class='navbtn rounded'>Go Back to Search &leftarrow;</button></a>";
    }
    ?>
    </div>
    <script src='/FVLibraryWebClient/Assets/bookCardHandler.js'></script>
</div>

</body>
</html>