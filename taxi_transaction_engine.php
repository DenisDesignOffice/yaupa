
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
$time=$_SESSION['time'];
$pickup_point=$_SESSION['pickup_point'];
$destination=$_SESSION['destination'];


$firstname2=htmlspecialchars($_REQUEST['firstname2']);
$lastname2=htmlspecialchars($_REQUEST['lastname2']);
$phone2=htmlspecialchars($_REQUEST['phone2']);
$amount2=htmlspecialchars($_REQUEST['amount2']);
$slip_no=htmlspecialchars($_REQUEST['slip_no']);
$date2=htmlspecialchars($_REQUEST['date2']);
$bank=htmlspecialchars($_REQUEST['bank2']);


?>


<?php


$name=mysql_query("SELECT * FROM company_address WHERE id='$value'");
$run=mysql_fetch_assoc($name);
$address=$run['address'];



$name=mysql_query("SELECT * FROM transport_companies WHERE id='$value'");
$ro=mysql_fetch_assoc($name);
$company_name=$ro['company_name'];


$result= mysql_query("SELECT * FROM taxi WHERE company_id='$value' ");
while($row=mysql_fetch_assoc($result))
{

$coverage=$row["coverage_state"];
$pickup_point=$row["pickup_point"];
$hour=$row["amount_per_hour"];
$half=$row["amount_half_day"];
$full=$row["amount_full_day"];
$location=$row["location"];
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

$pin_value=array("0","1","2","3","4","5","6","7","8","9", "14" ,"17");

$pin1=random_generate($pin_value, 9);


$serial=random_generate($deposit, 6);



$put="INSERT INTO taxi_booking_details (company_id,firstname,lastname, coverage_duration, amount_paid, date_of_payment, pickup_point, phone, email, stoppage_point, name_of_depositor, deposit_slip_no, debit_no, date_of_pickup, pickup_time, pin, serial) VALUES('$value','$firstname','$lastname', '$coverage','$amount_paid', '$date_of_pay','$pickup_point', '$phone', '$email', '$destination', '$name_of_dep','$deposit', '$debit', '$date','$time', '$pin1', '$serial')";


$query=mysql_query($put);
if(!$query)
{
die("connection failed2".mysql_error());
}
$_SESSION['pin']=$pin1;
$_SESSION['serial']=$serial;
$_SESSION['company_name']=$company_name;
$_SESSION['location']=($location.",  ".$location_state);
//$_SESSION['destination']=($stoppage_point.",  ".$destination_state);

header("location:taxi_trans_sucess.php");
exit;
}

else
{

header("location:trans_success2.php");

}




?>




