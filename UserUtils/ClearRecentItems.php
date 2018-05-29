
<?php
session_start();
$clear_bool = $_REQUEST['doclear'];
echo "<div class='uifixes'>";
if ($clear_bool){
    unset($_SESSION['recent_book_list']);
    echo "<p style='color:green'>Cleared list successfully!</p>";
}
else {
    echo "<p style='color:red'>Unable to clear list!</p>";
}
echo "</div>"
?>