<?php

session_start();
require_once("../BookUtils/BookTools.php");
require_once("../Assets/Header.php");
require_once("../SQLUtils/GetConnection.php");
?>




<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="uifixes">
    <h1 class="title">Advanced Search Results</h1>
    <div class="cardList">


    <?php
        //echo "Getting POST Data:<br>";
        $column1 = $_POST['column1'];
        $column2 = $_POST['column2'];
        $column3 = $_POST['column3'];

        $column2_type = $_POST['column2_type'];
        $column3_type = $_POST['column3_type'];

        $column1val = $_POST['column1val'];
        $column2val = $_POST['column2val'];
        $column3val = $_POST['column3val'];



        //generate query

        //form validation

        if ($column1val == ""){
            //how did they get here? input required is there
            $_SESSION['msg'] = "<p class='title' style='color: red'>You need to input a search query for Column 1.</p>";
            header("Location: /FVLibraryWebClient/Search/AdvancedSearch.php");
            die();
        }
        if ($column1 == "select"){
            $_SESSION['msg'] = $_SESSION['msg']."<p class='title' style='color: red'>You need to select an option from the drop-down box in Column 1.</p>";
            header("Location: /FVLibraryWebClient/Search/AdvancedSearch.php");
            die();
        }
        if ($column2val != "" && $column2 == "select"){
            $_SESSION['msg'] = $_SESSION['msg']."<p class='title' style='color: red'>You need to select an option from the drop-down box in Column 2.</p>";
            header("Location: /FVLibraryWebClient/Search/AdvancedSearch.php");
            die();
        }
        if ($column3val != "" && $column3 == "select"){
            $_SESSION['msg'] = $_SESSION['msg']."<p class='title' style='color: red'>You need to select an option from the drop-down box in Column 3.</p>";
            header("Location: /FVLibraryWebClient/Search/AdvancedSearch.php");
            die();
        }

        // throw out empty boxes
        if ($column2val == ""){
            $column2 = "";
            $column2_type = "";
        }
        if ($column3val == ""){
            $column3 = "";
            $column3_type = "";
        }

        //echo "column1: ".$column1."<br>";
        //echo "column2: ".$column2."<br>";
        //echo "column3: ".$column3."<br><br>";

        //echo "column2_type: ".$column2_type."<br>";
        //echo "column3_type: ".$column3_type."<br><br>";

        //echo "column1val: ".$column1val."<br>";
        //echo "column2val: ".$column2val."<br>";
        //echo "column3val: ".$column3val."<br><br>";

        //generate query for real
        $query = "select * from Books where ".$column1." LIKE '%".$column1val."%'";
        if ($column2val != ""){
            $query = $query . " ".$column2_type." ".$column2." LIKE '%".$column2val."%'";
        }
        if ($column3val != ""){
            $query = $query . " ".$column3_type." ".$column3." LIKE '%".$column3val."%'";
        }
        //echo "GENERATED QUERY: ".$query."<br>";

        $conn = getDefaultConnection();
        $result = $conn->query($query);
        if ($result->num_rows == 0){
            echo "<p class='title' style='color:red'>Sorry, but no books were found</p>";
        }
        $_SESSION['previous'] = "advancedsearch";
        while ($row = $result->fetch_assoc()){
                $id = $row["ID"];
                /*echo "<a href='../BookPage.php?id=".$id."'>".$row["Title"]."</a>&emsp;
                      <p style='display: inline'>By: ".$row["Author"]."</p>
                      <br><br>";*/
                echo generateBookCard($id, "");
        }

    ?>
    </div>
    <a href="AdvancedSearch.php"><button class="rounded navbtn">&leftarrow; Back to Search</button></a>
</div>

</body>
</html>