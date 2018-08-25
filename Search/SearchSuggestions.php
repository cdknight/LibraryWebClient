<?php
    require("../SQLUtils/GetConnection.php");
    if ($_GET["ajax"] == "true"){
        echo "<link rel='/FVLibraryWebClient/Assets/searchSuggestions.css' />";

        echo "<div class='searchSuggestions'>";

        echo "<h2 class='title'>Suggestions</h2>";
        echo "<button type='button' style='display:inline' id='closeSuggestions' class='rounded navbtn'>Close</button>";

        $query = $_GET["query"];

        $db_query = "SELECT * FROM Books WHERE Author LIKE '%$query%' OR Title LIKE '%$query%' OR Genre LIKE '%$query%'";

        $conn = getDefaultConnection();

        $result = $conn->query($db_query);

        while ($row = $result->fetch_assoc()){
            $id = $row['ID'];
            $title = $row['Title'];
            $author = $row['Author'];
            $title_and_author = $title." By: ".$author;
            echo "<a href='/FVLibraryWebClient/BookPage.php?id=$id&squery=$query'><p class='small title'>$title_and_author</p></a>";
        }

       ?>


        <script>
            $("#closeSuggestions").click(function(ev){
                $(".searchSuggestions").slideUp();
            });
        </script>


<?php

        echo "</div>";
    }

    ?>