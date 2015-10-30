

<?php
$server="localhost";
$database="travelin";
$username="root";
$password="";


$connect=mysql_connect($server,$username,$password);
if(!$connect)
{
die( "connection failed".mysql_connect_error());
}

$query=mysql_select_db($database);

if(!$query)
{
die("connection failed". mysql_error());
}
?>
