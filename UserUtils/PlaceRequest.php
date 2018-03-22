<?php
    session_start();
    include("../Assets/Header.php")
?>

<!DOCTYPE html>

<html>
<head>
    <title>Place Request</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
session_start();
$bookid = $_GET['bookid'];
echo (string) isset($_SESSION['username']);
if (!isset($_SESSION['username']) || $_SESSION['username'] == ""){
    //user not logged in
    $goto = "Location: ../Login.php?next=PlaceRequest.php?bookid".$bookid;
    $_SESSION['msg'] = "<p style='color:red'>You must log in first to place a hold on a book</p>";
}


$username = $_SESSION['username'];

$conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
$query = "SElECT * FROM Users WHERE username=\"".$username."\"";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()){
    $userid = $row['id'];
}

$insert_request_query = "INSERT INTO Requests(bookid, userid) VALUES(".$bookid.",".$userid.")";
$conn->query($insert_request_query);
echo "<p>Your request has been placed.</p>"
?>
<a href="../UserAccount/Overview.php"><button>View Account Overview &leftarrow;</button></a>
<a href="../UserAccount/Requests.php"><button>View Requests List &leftarrow;</button></a>

</body>
</html>