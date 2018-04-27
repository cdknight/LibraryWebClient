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
    header($goto)
}


$username = $_SESSION['username'];

$conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
$query = "SElECT * FROM Users WHERE username=\"".$username."\"";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()){
    $userid = $row['id'];
}

$date_arr = getdate();
$date = $date_arr['year']."-".$date_arr['mon']."-".$date_arr['mday'];
//echo ($date);


$insert_request_query = "INSERT INTO Requests(bookid, userid, date_out, status) VALUES(".$bookid.",".$userid.",\"".$date."\",".getBookStatus($conn, $bookid).")";
echo $insert_request_query;
$conn->query($insert_request_query);
echo "<p>Your request has been placed.</p>";

function getBookStatus($conn, $bookid){
    $query = "SELECT * FROM ItemsOut WHERE bookid=".$bookid;
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()){
        if (isset($row['bookid'])){
            return 1;
        }
    }
    return 0;
}

?>
<a href="../UserAccount/Overview.php"><button>View Account Overview &leftarrow;</button></a>
<a href="../UserAccount/Requests.php"><button>View Requests List &leftarrow;</button></a>

</body>
</html>