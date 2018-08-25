<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../Assets/Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
    <div class="uifixes">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?>
        <h1 class="title">Search</h1>
        <form method="GET" action="SearchResults.php" autocomplete="off">
            <input id="squery" name="query" type="text" class="defaultinp"><br><br>
            <div id="searchSuggestionsContainer"></div>
            <input type="Submit" value="Search!" class="rounded navbtn"><br><br>

        </form>
        <a href="AdvancedSearch.php"><button class="rounded navbtn">Advanced Search</button></a>
    </div>
    <script>
        $("#squery").keyup(function(ev){
            $.get("/FVLibraryWebClient/Search/SearchSuggestions.php?ajax=true&query=" + $("#squery").val(), function(data){
                $("#searchSuggestionsContainer").html($(data));
            });
        });
    </script>
</body>
</html>
