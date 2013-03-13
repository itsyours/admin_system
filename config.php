<?php

$dbUser = "root";
$dbPass = "";
$dbDatabase = "login";
$dbHost = "localhost";

$dbConn = mysql_connect($dbHost, $dbUser, $dbPass);

if ($dbConn) {
    mysql_select_db($dbDatabase);
} else {
    die("<strong>Error: Nemožem sa pripojit na databázu</strong> ");
}
?>
