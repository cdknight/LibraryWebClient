<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="../main.css" >
</head>
<body>
<h1 class="title">Create an Account</h1>
<?php
//the next line is simply to debug what the user inputs to see if the data is coming through!
//echo $_POST['firstname']."<br>".$_POST['lastname']."<br>".$_POST['passwd']."<br>".$_POST['passwd_validate'];

if ($_POST['passwd'] != $_POST['passwd_validate']){
    $_SESSION['msg'] = "<p style='color:red'>The passwords do not match. Try again </p>";
    header("Location: CreateAccount.html");
}

$username = trim(strtolower($_POST['firstname'])).trim(strtolower($_POST['lastname']));
$firstname = $_POST['firstname'];
$lastname= $_POST['lastname'];
$hashedpasswd = hash('sha256', $_POST['passwd'].$_POST['emailaddr']);
$email = $_POST['emailaddr'];
$apt = $_POST['aptnum'];
$conn = new mysqli("localhost", "default_u", 'letmeinmysql', 'lcatalog');

$insert_query = "INSERT INTO Users(firstname, lastname, password, username,email, apt) VALUES(\"".$firstname."\",\"".$lastname."\",\"".$hashedpasswd."\",\"".$username."\",\"".$email."\",".$apt.")";
//echo $insert_query;
$conn->query($insert_query);

echo "<p>Your account was successfully created. Please press \"Log in\" in order to log in with the credentials you just used. </p>";
?>
<a href="../Login.php">Log in</a>
</body>
</html>
