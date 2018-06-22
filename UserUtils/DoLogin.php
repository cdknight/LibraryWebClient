<!DOCTYPE html>

<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
    session_start();
    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    $query = "SELECT * FROM Users";
    $result = $conn->query($query);

    $wanted_username = $_POST['username'];
    $wanted_passwd = $_POST['passwd'];

    $username_validated = false;
    $passwd_validated = false;

    while ($row = $result->fetch_assoc()){
        if ($wanted_username == $row['username']){
            $username_validated = true;
            if (hash('sha256', $wanted_passwd.$row['email']) == $row['password']){
                $passwd_validated = true;
            }
        }

    }

    if (!$passwd_validated || !$username_validated){
        $_SESSION['msg'] = "<div class='uifixes'><p style='color:red'>The password or username is incorrect. Please try again. </p></div>";
        header("Location: ../Login.php");
    }
    else{
        echo "Login Successful!";
        $_SESSION['username'] = $wanted_username;
        if (isset($_SESSION['next'])){
            header("Location: ".$_SESSION['next']);
        }
        else {
            header("Location: ../UserAccount/Overview.php");
        }

    }

?>

</body>
</html>