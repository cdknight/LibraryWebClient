
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<body>
        <div class="vertnav">
            <b style="font-family: "Verdana">FVLibraryCatalog</b><br><br>
            <a href="/FVLibraryWebClient/Search.php"><button class='rounded navbtn'>Search</button> </a><br><br>
            <?php
            session_start();
            if (!isset($_SESSION['username'])){
                echo "<a href=\"/FVLibraryWebClient/Login.php\"><button class='rounded navbtn'>Login</button></a><br><br>";
            }
            elseif(isset($_SESSION['username'])){
                echo "<a href='/FVLibraryWebClient/UserAccount/Overview.php'><button class='rounded navbtn'>Account Overview</button></a><br><br>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/Requests.php'><button class='rounded navbtn'>Requests</button></a><br><br>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/ItemsOut.php'><button class='rounded navbtn'>Items Out</button></a><br><br>";
                echo "<li><a href='/FVLibraryWebClient/UserUtils/Logout.php'><button class='rounded navbtn'>Log Out</button></a></li><br><br>";
                echo "<li class='nonhover'><a  style='float: left'>Welcome, ".$_SESSION['username']."!</a></li>";

            }

            ?>
        </div>


</body>