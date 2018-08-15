<!DOCTYPE html>
<?php
require("../Assets/Header.php") ?>
<html>
<head>

</head>
<body>
    <div class="uifixes">

        <h1 class="title">Advanced Search</h1>
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="AdvancedSearchResults.php">
            <label class="title" for="column1">Column 1: </label>
            <select name="column1" class="rounded navselect">
                <option value="select">Select Category</option>
                <option value="Author">Author</option>
                <option value="Title">Title</option>
                <option value="Genre">Genre</option>
            </select>
            <input class="defaultinp" name="column1val" required>

            <br><br>

            <select class="rounded navselect" name="column2_type">
                <option value="and">And</option>
                <option value="or">Or</option>
                <option value="and not">Not</option>
            </select>



            <label class="title" for="column2">Column 2: </label>
            <select name="column2" class="rounded navselect">
                <option value="select">Select Category</option>
                <option value="Author">Author</option>
                <option value="Title">Title</option>
                <option value="Genre">Genre</option>
            </select>
            <input class="defaultinp" name="column2val">

            <br><br>

            <select class="rounded navselect" name="column3_type">
                <option value="and">And</option>
                <option value="or">Or</option>
                <option value="and not">Not</option>
            </select>


            <label class="title" for="column2">Column 3: </label>
            <select name="column3" class="rounded navselect">
                <option value="select">Select Category</option>
                <option value="Author">Author</option>
                <option value="Title">Title</option>
                <option value="Genre">Genre</option>
            </select>
            <input class="defaultinp" name="column3val">

            <br><br>

            <input type="submit" class="rounded navbtn" value="Submit">
        </form>

    </div>

</body>
</html>
