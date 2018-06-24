<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../Assets/Header.php") ?>
<html>
<head>

</head>
<body>
    <div class="uifixes">
        <h1 class="title">Advanced Search</h1>
        <form method="POST" action="AdvancedSearchResults.php">
            <label class="title" for="column">Column 1: </label>
            <select name="column1" class="rounded navbtn">
                <option value="">Author</option>
                <option value="test2">Title</option>
                <option value="test2">Genre</option>
            </select>
            <input class="defaultinp" name="column1val">
        </form>

    </div>

</body>
</html>
