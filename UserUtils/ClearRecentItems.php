
<?php
session_start();
$clear_bool = $_REQUEST['doclear'];
if ($clear_bool){
    unset($_SESSION['recent_book_list']);
    echo "<div style='margin: 0 auto'><p style='color:green'>Cleared list successfully!</p></div>";
}
else {
    echo "<div style='margin 0 auto'><p style='color:red'>Unable to clear list!</p></div>";
}

?>