
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<body>
    <ul class="horizontal_navbar">
        <b><li class="nonhover"><a>FVLibraryCatalog</a></li></b>
        <li><a href="/FVLibraryWebClient/Search.php">Search</a></li>
        <?php
            session_start();
            if (!isset($_SESSION['username'])){
                echo "<li><a href=\"/FVLibraryWebClient/Login.php\">Login</a></li>";
            }
            elseif(isset($_SESSION['username'])){
                echo "<li><a href='/FVLibraryWebClient/UserAccount/Overview.php'>Account Overview</a>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/Requests.php'>Requests</a>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/ItemsOut.php'>Items Out</a>";
                echo "<li><a href='/FVLibraryWebClient/UserUtils/Logout.php'>Log Out</a></li>";
                echo "<li class='nonhover'><a  style='float: right'>Welcome, ".$_SESSION['username']."!</a></li>";

            }

        ?>
    </ul
</body>