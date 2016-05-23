<?php session_start();?>

<?php
if(!isset($_GET['selected_option_id']))
{
 header("location: /index.php");
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


$result= mysql_query("SELECT * FROM charter WHERE company_id='$value' ");

while($row=mysql_fetch_assoc($result))
{

$cost=$row["cost"];
$location_state=ucfirst($row["location_state"]);
$destination=ucfirst($row["destination"]);
$destination_state=ucfirst($row["destination_state"]);
$to_cost=$row["to_cost"];
$to_and_fro_cost=$row["to_and_fro_cost"];
$service_hours=$row["service_hours"];
$type=$row["vehicle_type"];
$location=ucfirst($row["location"]);
$processing=$row["processing_fee"];
$cost=$cost + $processing;
$address=$row["address"];
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

$pin_value=array("0","1","2","3","4","5","6","7","8","9", "14" ,"17");

$pin1=random_generate($pin_value, 9);


$serial=random_generate($deposit, 6);



$put="INSERT INTO charter_booking_records (firstname,lastname, email, phone, address, vehicle_type, location, location_state, destination, destination_state, to_cost, to_and_fro_cost, processing_fee, amount_paid, payment_date, bank_deposit_no, debit_no, name_of_depositor, company_name, reg_pin, serial) VALUES('$firstname','$lastname', '$email', '$phone', '$address', '$type', '$location','$location_state', '$destination', '$destination_state', '$to_cost', '$to_and_fro_cost', '$processing_fee', '$amount', '$date_of_pay', '$deposit', '$debit','$firstname2',  '$company_name', '$pin1', '$serial')";


$query=mysql_query($put);
if(!$query)
{
die("connection failed2".mysql_error());
}


$_SESSION['pin']=$pin1;
$_SESSION['serial']=$serial;
$_SESSION['company_name']=$company_name;
$_SESSION['location']=($location.",  ".$location_state);
$_SESSION['destination']=($destination.",  ".$destination_state);
header("location:trans_success.php");

}

else
{
$pending="transaction not yet verified. please try again later";

//$_SESSION['pending']=$pending;
//header("location:trans_success.php");
}





?>



