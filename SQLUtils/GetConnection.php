<?php

function getDefaultConnection(){
    $db_vars = explode("\n", file_get_contents("/var/www/html/FVLibraryWebClient/SQLUtils/ConnectionData.txt"));

    $user = $db_vars[0];
    $password = $db_vars[1];
    $host = $db_vars[2];
    $dbname = $db_vars[3];

    return new mysqli($host, $user, $password,$dbname);
}

