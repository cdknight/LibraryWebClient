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
    <link rel="stylesheet" type="text/css" href="../Assets/modal.css">

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
            <a href="ChangeUserInformation.php"><button class="rounded navbtn">Change</button></a>
            <div class="modal">
                <div id="modal_header">
                    <h2 class="title modal-title">Change</h2>
                </div>
                <div class="modal-content">
                    <form method="POST">
                        <select class="navselect rounded">
                            <option name="emailaddr">Email Address</option>
                            <option name="aptnum">Apartment Number</option>
                        </select><br><br>
                        <label id="change_value_label" class="title" for="change-val">Value: </label>
                        <input name="change-val" class="defaultinp"><br><br>
                        <input type="submit" class="rounded navbtn" value="change">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
</html>