<!DOCTYPE html>

<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>



<?php
  $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
  $query = "SELECT * FROM Books WHERE ID=".$_GET['id'];
  $result = $conn->query($query);


  while ($row = $result->fetch_assoc()){
      $author = $row["Author"];
      $title = $row["Title"];
      $genre = $row["Genre"];
      $notes_checkedout = $row["Notes1"];
      $notes_missing = $row["Notes2"];
  }

echo "<h1 class='title'>".$title."</h1>";
echo "<p>Author: ".$author."</p>";
echo "<p>Genre: ".$genre."</p>";
if ($notes_checkedout){
    echo "<p>This book was checked out on: ".$notes_checkedout."</p>";
}
else{
    echo "<p>This book has not been checked out.</p>";
}

if ($notes_missing){
    echo "<p>This book has been reported as missing! You will not be able to check this book out.</p>";
}
?>
<a href="Search.html"><button>Go Back to Search &leftarrow;</button></a>
<a href="index.php"><button>Go Home &leftarrow;</button></a>
<?php echo "<a href='SearchResults.php?query=".$_GET['squery']."'><button>Go Back to Search Results &leftarrow;</button></a>" ?>
</body>
</html>
