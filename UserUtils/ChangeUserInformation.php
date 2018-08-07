<?php
    //retr vars
    session_start();
    require("../SQLUtils/GetConnection.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $tochange = $_POST['to_change'];
    $changeval = $_POST['change_val'];
    $username = $_SESSION['username'];
    $conn = getDefaultConnection();

    if (!isset($username)){
        //not logged in.
        echo "<p class='title' style='color:red'>You are not logged in!</p>";
        die();
    }
    if ($tochange == 'aptnum'){
        $query = "UPDATE Users SET apt=".$changeval." WHERE username='".$username."'";
    }
    elseif ($tochange == "emailaddr"){
        //must also update password
        $result = $conn->query("SELECT * FROM Users");
        while ($row = $result->fetch_assoc()){
            if ($row['username'] == $username){
                if (hash('sha256', $_POST['passwd'].getEmailFromUsername($conn, $username)) != $row['password']){
                    echo "<p class='title' style='color:red'>The password was incorrect. Please try again.</p>";
                    die();
                }
            }

        }

        $query = "UPDATE Users SET email='".$changeval."' WHERE username='".$username."'";
        //echo $changeval."<br>";
        $newpass = hash('sha256', $_POST['passwd'].$changeval);
        $query_2 = "UPDATE Users SET password='$newpass' WHERE username='$username'";
        //echo $query_2."<br>";
        $result_2 = $conn->query($query_2);
        if ($result_2 == false){
            echo "<p class='title' style='color:red'>The value was not updated successfully. Try again later.</p>";
            die();
        }
    }

    //echo $query."<br>";
        $result = $conn->query($query);
        if ($result != false){
            echo "<p class='title' style='color:green'>The value was updated successfully</p>";
        }
        else {
            echo "<p class='title' style='color:red'>The value was not updated successfully. Try again later.</p>";
            die();
}
    /**
     * @conn mysqli
     */
    function getEmailFromUsername($conn, $username){
        $result = $conn->query("SELECT * FROM Users");
        while ($row = $result->fetch_assoc()){
            if ($row['username'] == $username){
                return $row['email'];
            }
        }
    }
