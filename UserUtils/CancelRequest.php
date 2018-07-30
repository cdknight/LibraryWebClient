<?php session_start();
//include("../Assets/Header.php");
require("../SQLUtils/GetConnection.php");


?>
<!DOCTYPE html>

<head>
    <title>Cancel Request</title>
</head>
<html>
    <?php
        $conn = getDefaultConnection();
        $query = "DELETE FROM Requests WHERE id=".$_GET['id'];
        $conn->query($query);
        $_SESSION['msg'] = "<p class='title' style='color:green'>The request was canceled successfully.</p>";
        header("Location: ../UserAccount/Requests.php")
    ?>
</html>