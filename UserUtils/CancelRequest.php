<?php session_start();
include("../Assets/Header.php");
?>
<!DOCTYPE html>

<head>
    <title>Cancel Request</title>
</head>
<html>
    <?php
        $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
        $query = "DELETE FROM Requests WHERE id=".$_GET['id'];
        $conn->query($query);
        $_SESSION['msg'] = "<div class='uifixes'><p style='color:green'>The request was canceled successfully.</p></div>";
        header("Location: ../UserAccount/Requests.php ")
    ?>
</html>