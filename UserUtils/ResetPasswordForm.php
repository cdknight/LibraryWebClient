<?php require("../Assets/Header.php");

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="uifixes">

    <h1 class="title">Reset Password</h1>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="SendPasswordResetMail.php" method="POST">
        <label for="emailaddr">Enter E-Mail Address: </label>
        <input class="defaultinp" name="emailaddr"><br><br>
        <input class="rounded navbtn" type="submit" value="Submit">
    </form>
</div>

</body>
</html>
