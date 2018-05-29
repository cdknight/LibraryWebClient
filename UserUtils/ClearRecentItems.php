<?php
session_start();
$clear_bool = $_REQUEST['doclear'];
if ($clear_bool){
    unset($_SESSION['recent_book_list']);
    echo "<p style='color:green'>Cleared list successfully!</p>";
}
echo "<p style='color:red'>Unable to clear list!</p>"
?>