<?php
    include("../Assets/Header.php");
    session_start();
    if (!isset($_SESSION['username'])){
        //not logged in, dump at Login page to log in <i>with</i> msg
        $_SESSION['msg'] = "<div class='uifixes'><p style='color=red'>You must log in first in order to view your account overview.</p></div>";
        header("Location: ../Login.php");
    }
?>



<!DOCTYPE html>

<html>
<head>
    <title>Overview</title>
    <link rel="stylesheet" type="text/css" href="../Assets/main.css">
</head>
<body>
<div class="uifixes">
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
            echo "<p class='title'>First Name: ".$firstname . "</p>";
            echo "<p class='title'>Last Name: ". $lastname . "</p>";
            echo "<p class='title'>Email Address: ". $email . "</p>";
            echo "<p class='title'>Apartment Number: ". $aptnum . "</p>";

            ?>
        </div>

    </div>
</div>


</body>
</html>