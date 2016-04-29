<?php

session_start();

include_once "../../util/connection.php";

$response = '';

$id = strtolower(htmlspecialchars($_POST['id']));
$name = strtolower(htmlspecialchars($_POST['name']));
$tag = strtolower(htmlspecialchars($_POST['tag']));
$email = strtolower(htmlspecialchars($_POST['email']));
$phone = strtolower(htmlspecialchars($_POST['phone']));
$logo = strtolower(htmlspecialchars($_POST['phone']));
$head_office = strtolower(htmlspecialchars($_POST['head_office']));
$purpose = strtolower(htmlspecialchars($_POST['purpose']));


if ($purpose == 'edit') {

    $action = "UPDATE transport_companies SET(name, tag, email, phone, logo, head_office) "
            . "VALUES('$name', '$tag', '$email', '$phone', '$logo', '$head_office') WHERE id='{$id}'";

    $query = mysql_query($action);

    if (!$query) {
        die("connection failed" . mysql_error());
    }else{
        echo "Edited Successfully";
    }
    
} else {
    
}
?>