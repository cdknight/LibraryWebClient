<?php
session_start();

if (!isset($_SESSION['username'])){
    echo $_SESSION['username'];
    echo "fail";
}
elseif(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    if ($_GET['ajax']=='true'){
        echo "success";
    }
    else {
        header("Location: /FVLibraryWebClient/index.php");
    }

}
?>
