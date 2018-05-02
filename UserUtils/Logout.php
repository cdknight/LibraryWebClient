<!DOCTYPE html>

<html>
<head>
    <title>Log Out</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username'])){
    echo $_SESSION['username'];
    echo "<p>Error: no user is logged in.</p>";
    echo "<a href='../index.php'><button>Go Home &leftarrow;</button></a>";
}
elseif(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    echo "<p>You have been logged out successfully.</p>";
    echo "<a href='../index.php'><button>Go Home &leftarrow;</button></a>";
}

?>
</body>
</html>

