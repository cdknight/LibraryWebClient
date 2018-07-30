<?php
session_start();
require('../Assets/Header.php');
require("../SQLUtils/GetConnection.php");
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="uifixes">
    <h1 class="title">Reset Password</h1>
    <?php
        if($_SESSION['password_reset_allowed'] == true){
            unset($_SESSION['next']);
            $query = "update Users set password=\"".hash('sha256', $_POST['newpass'].$_SESSION['password_reset_email'])."\" where username=\"".$_SESSION['password_reset_username']."\"";
            //echo $query;
            $conn = getDefaultConnection();
            $result = $conn->query($query);
            unset($_SESSION['password_reset_allowed']);
            unset($_SESSION['password_reset_email']);
            unset($_SESSION['password_reset_username']);
            if ($result == false){
                echo "<p style='color:red' class='title'>Something went wrong when changing your password. Please try again.</p>";
                die();
            }
            else {
                echo "<p style='color:green' class='title'>Your password was changed successfully. Use the \"Login\" button on the left to log in with your new credentials.</p>";
            }
        }
    ?>
</div>
</body>
</html>
