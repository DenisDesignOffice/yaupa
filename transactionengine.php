
<?php session_start();?>

<?php
if(!isset($_GET['selected_option_id']))
{
header("location:home.php");
}
require_once "connection.php";
require_once "pin_generator.php";
?>




<?php

$value=$_SESSION['selected_option_id'];
$firstname=$_SESSION['firstname'];
$location=$_SESSION['location'];
$lastname=$_SESSION['lastname'];
$phone=$_SESSION['phone'];
$email=$_SESSION['email'];
$date=$_SESSION['date'];
$payment_option=$_SESSION['payment_option'];
$next_of_kin=$_SESSION['next_of_kin'];


$firstname2=$_REQUEST['firstname2'];
$lastname2=$_REQUEST['lastname2'];
$phone2=$_REQUEST['phone2'];
$amount2=$_REQUEST['amount2'];
$slip_no=$_REQUEST['slip_no'];
$date2=$_REQUEST['date2'];
$bank=$_REQUEST['bank2'];


?>


<?php


$name=mysql_query("SELECT * FROM company_address WHERE id='$value'");
$run=mysql_fetch_assoc($name);
$address=$run['address'];



$name=mysql_query("SELECT * FROM transport_companies WHERE id='$value'");
$ro=mysql_fetch_assoc($name);
$company_name=$ro['company_name'];


$result= mysql_query("SELECT * FROM travel_details WHERE id='$value' ");
while($row=mysql_fetch_assoc($result))
{

$cost=$row["cost"];
$town=$row["fromplace"];
$toward=$row["toplace"];
$aircondition=$row["aircondition"];
$stopage=$row["stopage_point"];
$speed=$row["speed_limit"];
$time=$row["departure_time"];
$type=$row["vehicle_type"];
$lastbus=$row["last_bus_stop"];
$duration=$row["duration"];
$processing=$row["processing_fee"];
$cost=$cost + $processing;
}

$confirm=mysql_query("SELECT * FROM bank_transactions");
while($row2=mysql_fetch_assoc($confirm))
{
$debit=$row2['debit_trans_pin'];
$deposit=$row2['deposit_slip_no'];
$name_of_dep=$row2['name_of_depositor'];
$date_of_pay=$row2['date_of_payment'];
$amount_paid=$row2['amount'];
$depositors_phone=$row2['phone'];
}



mt_srand ((double) mktime() * 100000000);



if($deposit==$slip_no && $date_of_pay==$date2 || $debit==$slip_no && $date_of_pay==$date2 )
{

$pin_value=array("0","1","2","3","4","5","6","7","8","9");

$pin1=random_generate($pin_value, 9);


$serial=random_generate($deposit, 6);



$put="INSERT INTO booking_records (firstname,lastname, email, phone, traveling_date, next_of_kin, mode_of_payment, reg_pin, serial, transport_company, amount_paid, destination, bank_slip_no, bank_of_payment, name_of_depositor, date_of_deposition, address) VALUES('$firstname','$lastname', '$email', '$phone', '$date', '$next_of_kin', '$payment_option','$pin1', '$serial', '$company_name', '$cost', '$town - $toward', '$slip_no', '$bank', '$firstname2 $lastname2', '$date2', '$location')";


$query=mysql_query($put);
if(!$query)
{
die("connection failed".mysql_error());
}
$_SESSION['pin']=$pin1;
$_SESSION['serial']=$serial;
header("location:trans_success.php");

}

else
{
echo "transaction not yet verified. please try again later";

header("location:trans_success2.php");
}




?>




