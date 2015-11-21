<?php session_start(); ?>
<?php

if(!isset($_GET['selected_option_id']))
{
header("location:index.php");
}

require_once "connection.php";
?>





<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
$value=$_REQUEST['selected_option_id'];
$firstname=htmlspecialchars($_POST['firstname']);
$location=htmlspecialchars($_REQUEST['address']);
$lastname=htmlspecialchars($_POST['lastname']);
$phone=htmlspecialchars($_REQUEST['phone']);
$email=htmlspecialchars($_REQUEST['email']);
$date=htmlspecialchars($_REQUEST['date']);
$payment_option=htmlspecialchars($_REQUEST['payment_option']);
$pickup_point=htmlspecialchars($_REQUEST['pickup_point']);
$time=htmlspecialchars($_REQUEST['pickup_time']);


$_SESSION['firstname']=$firstname;
$_SESSION['lastname']=$lastname;
$_SESSION['location']=$location;
$_SESSION['phone']=$phone;
$_SESSION['payment_option']=$payment_option;
$_SESSION['pickup_point']=$pickup_point;
$_SESSION['date']=$date;
$_SESSION['email']=$email;
$_SESSION['selected_option_id']=$value;
$_SESSION['time']=$time;

}
?>

<html>
<head>
<title></title>
</head>
<body>

</body>
</html>

<?php
$check="Bank_Deposit";
if($check==$payment_option)
{
header("location:taxi_deposit_form.php");
}

else
{
header("location:index.php");
}
?>


