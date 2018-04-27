<?php
    session_start();
    if (!isset($_SESSION['username'])){
        //not logged in, dump at Login page to log in <i>with</i> msg
        $_SESSION['msg'] = "You must log in first in order to view your account overview.";
        header("Location: ../Login.php");
    }
?>



<!DOCTYPE html>

<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<div class="content">
    <h1 class="title">Overview</h1>
</div>
<div>
    <h2 class="title">Links</h2>
    <ul class="vertical_navbar">
        <li><a href="ItemsOut.php">Items Out</a></li>
        <li><a href="Requests.php">Requests</a></li>
    </ul>
</div>
<div class="content">
    <h2 class="title">Account Information</h2>
    <?php




    ?>
</div>
</body>
</html>