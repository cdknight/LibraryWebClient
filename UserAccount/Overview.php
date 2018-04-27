<?php
    include("../Assets/Header.php");
    session_start();
    if (!isset($_SESSION['username'])){
        //not logged in, dump at Login page to log in <i>with</i> msg
        $_SESSION['msg'] = "<p style='color=red'>You must log in first in order to view your account overview.</p>";
        header("Location: ../Login.php");
    }
?>



<!DOCTYPE html>

<html>
<head>
    <title>Overview</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<div class="content">
    <div class="content_left">
        <h2 class="title">Links</h2>
        <ul class="vertical_navbar">
            <li><a href="ItemsOut.php">Items Out</a></li>
            <li><a href="Requests.php">Requests</a></li>
        </ul>
    </div>
    <div class="content">
        <h2 class="title">Account Information</h2>
        <?php
        $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
        $query= "SELECT * FROM Users WHERE username=\"".$_SESSION['username']."\"";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $aptnum = $row['apt'];
        }
        echo "<p>First Name: ".$firstname . "</p>";
        echo "<p>Last Name: ". $lastname . "</p>";
        echo "<p>Email Address: ". $email . "</p>";
        echo "<p>Apartment Number: ". $aptnum . "</p>";

        ?>
    </div>
    <div class="content_right">
        <a href="../UserUtils/Logout.php"><button>Log Out...</button></a>
    </div>
</div>

</body>
</html>