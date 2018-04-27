<?php
include('Assets/Header.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="main.css" >
</head>
<body>
<?php session_start(); echo $_SESSION['msg']; $_SESSION['msg'] = "" ?>
    <div class="content">
        <h1 class="title">Log In</h1>
        <?php echo '<form method="POST" action="UserUtils/DoLogin.php?next='.$_GET['next'].'">' ?>
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="passwd"><br><br>
            <input type="submit" value="Log in" >
        </form>
        <!--<p>No account? Click <a href="UserUtils/CreateAccount.html">here</a> to create one.</div></p>-->
    </div>

</body>
</html>
