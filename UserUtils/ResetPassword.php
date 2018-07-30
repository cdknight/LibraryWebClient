<?php
session_start();
require('../Assets/Header.php');
require('EncryptLib.php');
require("../SQLUtils/GetConnection.php")
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="uifixes">
    <h1 class="title">Change Password</h1>
    <?php
        $token = $_GET['token'];
        $token_splitted = explode("_", $token);
        $email = decrypt($token_splitted[0],'6bRoYBGlR2zjgYR4KcDD');
        //echo $email;
        //generate rest of token
        //echo $email;
        $new_token = hash('sha256',getHashedPasswordFromEmail($email).getUsernameFromEmail($email).date("Ymd.h"));
        if ($new_token != $token_splitted[1]){
            echo "<p style='color:red' class='title'>Sorry, but there was an error processing this request. Please try again.</p>";
            die();
        }
        else {
            $_SESSION['password_reset_allowed'] = true;
            $_SESSION['password_reset_username'] = getUsernameFromEmail($email);
            $_SESSION['password_reset_email'] = $email;

            echo "<form action='DoResetPassword.php' method='POST'>";
            echo "<label for='newpass' class='title'>New Password: </label>";
            echo "<input class='defaultinp' name='newpass' type='password'><br><br>";
            echo "<input type='submit' class='rounded navbtn' value='Change Password'>";
            echo "</form>";
        }
        function getHashedPasswordFromEmail($email){
            $conn = getDefaultConnection();
            $result = $conn->query("SELECT password FROM Users WHERE email=\"".$email."\"");
            if($result->num_rows == 0){return false;}
            while ($row = $result->fetch_assoc()){
                return $row['password'];
            }
        }
        function getUsernameFromEmail($email){

            $conn = getDefaultConnection();
            $result = $conn->query("SELECT username FROM Users WHERE email=\"".$email."\"");
            if($result->num_rows == 0){return false;}
            while ($row = $result->fetch_assoc()){
                return $row['username'];
            }
        }
    ?>
</div>
</body>
</html>
