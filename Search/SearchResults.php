<?php session_start();
include("../Assets/Header.php");
include("../SQLUtils/GetConnection.php")
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
    $query = "SELECT * FROM Books WHERE Author LIKE '%".$_GET['query']."%' OR Title LIKE '%".$_GET['query']."%' OR Genre LIKE '%".$_GET['query']."%' OR Notes1 LIKE '%".$_GET['query']."%' OR Notes2 LIKE '%".$_GET['query']."%'";
    $result = $conn->query($query);
    ?>
    <h1 class="title">Search Results</h1>
    <?php
    while($row = $result->fetch_assoc()){
        $id = $row['ID'];
        echo "<a href=\"../BookPage.php?id=".(string)$id."&squery=".$_GET["query"]."\">".$row['Title']." </a><i>&emsp;&emsp;By: </i>".$row['Author']."<br><br>";
    }
    if ($result->num_rows == 0){
        echo "<p class='title'>There are no search results for this term.</p>";
        echo "<a href='/FVLibraryWebClient/Search/Search.php'><button class='navbtn rounded'>Go Back to Search &leftarrow;</button></a>";
    }
    ?>
</div>

</body>
</html>
