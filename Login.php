<?php
include('Assets/Header.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="Assets/main.css" >
</head>
<body>
<?php session_start(); echo $_SESSION['msg']; $_SESSION['msg'] = "";
unset($_SESSION['next']);
if (isset($_GET['next'])){
    $_SESSION['next'] = $_GET['next'];
}
?>
    <div class="content">
        <h1 class="title">Log In</h1>
        <?php echo '<form method="POST" action="UserUtils/DoLogin.php">' ?>
            <label for="username" class="title">Username: </label>
            <input type="text" name="username" class="defaultinp"><br><br>
            <label for="passwd" class="title">Password: </label>
            <input type="password" name="passwd" class="passwdinp"><br><br>
            <input type="submit" class="rounded navbtn" value="Log in" >
        </form><br>
        <a href="UserUtils/ResetPasswordForm.php">Forgot password?</a>
        <!--<p>No account? Click <a href="UserUtils/CreateAccount.html">here</a> to create one.</div></p>-->
    </div>

</body>
</html>
