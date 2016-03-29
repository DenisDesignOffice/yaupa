<?php

$server = "127.0.0.1";
$database = "yaupbhei_yaupadb2";
$username = "yaupbhei_root";
$password = "JAc4@3%@To7r";

//Create connection
$connect = mysql_connect($server, $username, $password);

//Check connection
if (!$connect) {
    die("connection failed" . mysql_connect_error());
}

$query = mysql_select_db($database, $connect);

if (!$query) {
    die("connection failed" . mysql_error());
}

?>
