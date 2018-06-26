<?php
session_start();
include("Assets/Header.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fellowship Village Library Catalog</title>
    <link rel="stylesheet" type="text/css" href="Assets/main.css">
</head>
<body>
    <div class="content">
        <h1 class="title">Fellowship Village Library Catalog</h1>
        <p class="title">Press "Login" if you want to log in to your account, and "Search" if you want to search for a book. <br>If you would like to create an account for the catalog, please contact the librarian.
        </p>


        <?php
        $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
        //echo "rbooklist: ". $_SESSION['recent_book_list'].count($_SESSION['recent_book_list']);
        //print_r($_SESSION['recent_book_list']);
        //echo sizeof($_SESSION['recent_book_list']);
        if (isset($_SESSION['recent_book_list'])){
            echo '<h3 class="title">Recent Items: </h3>';
            echo "<div class='carousel'><ul>";
            for ($i = 0; $i < sizeof($_SESSION['recent_book_list']); $i++){
                $value = $_SESSION['recent_book_list'][$i];
                //echo $i."<br>";
                echo "
                        <li><img style='height:200px;width:auto' src='Assets/book.png'><br><a href='BookPage.php?id=".$value."'>".getBookTitleFromId($conn, $value)."</a></li>
                       ";

            }
            echo "</ul></div>";
            echo "<button class=\"rounded navbtn\" onclick=\"ajax_clear_recent_items()\">Clear Items</button>";
        }
        else {
            echo "<p class='title'>When you search for items, the books you click on will appear here for easy access.</p>";
        }

        function getBookTitleFromId($conn, $id){
            $result = $conn->query("SELECT Title FROM Books WHERE ID=".$id);
            while ($row = $result->fetch_assoc()){
                return $row['Title'];
            }
        }
        ?>


        <script>
            function ajax_clear_recent_items(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementsByClassName("carousel")[0].innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "UserUtils/ClearRecentItems.php?doclear=true", true);
                xmlhttp.send();
            }
        </script>
    </div>
</body>
</html>
