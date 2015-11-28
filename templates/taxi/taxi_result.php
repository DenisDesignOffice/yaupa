
<!-- Connect to database -->
<?php
require_once "../../util/connection.php";

if(!isset($_GET['selected_option_id']))
{
header("location:../../index.php");
}

?>


<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taxi</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/charterform.css"/>

<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/charter.css"/>
<script src="js/modernizr.custom.js"></script>


</head>

<body>
<header id="ha-header" class="ha-header ha-header-large">

<div class="ha-header-perspective">

<div class="ha-header-front">

<h1><a href="index.php">Yaupa</a></h1>

<nav>

<a href="charter.php">Charter</a>

<a href="travel.php">Travel</a>

<a href="taxi.php">Taxi</a>

</nav>

</div>
</div>
</header>
<section class="charter">
<h1></h1>
</section>



 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 </section>
 
 <div class="wrapper">
  <div class="masonry">
  
  
  
  
  <!-- Query database for search result -->

<?php

$location=strtolower($_POST['from']);

$state=strtolower($_POST['location_state']);
$to=$_POST['to'];

$result= mysql_query("SELECT * FROM taxi WHERE coverage_state='$state' ");

if(!$result)
{
die("connection failed".mysql_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){
if(mysql_num_rows($result)==0)
{
$response= "Sorry there is no available transport company for your destination currently. please check back soon";
exit;
}


else
{
while($row=mysql_fetch_assoc($result))
{
$value=$row["company_id"];

$name=mysql_query("SELECT * FROM transport_companies WHERE id='$value'");
$ro=mysql_fetch_assoc($name);
$company_name=$ro['company_name'];

$name=mysql_query("SELECT * FROM company_address WHERE id='$value'");
$run=mysql_fetch_assoc($name);
$address=$run['address'];


$coverage_state=ucfirst($state);
$location=ucfirst($row["location"]);
$coverage_distance=ucfirst($row["coverage_distance"]);
$amount_per_hour=$row["amount_per_hour"];
$half_day=$row["amount_half_day"];
$full_day=$row["amount_full_day"];
$processing_fee=$row["processing_fee"];

$_SESSION['destination']=$to;
 
  
  echo '
  <div class="item">
  <img src="images/banner-casa.jpg">
  <h2>Blocking Passages</h2>
  
  <table>
  <tr>
  <td><i class="fa fa-user"></i>&nbsp;&nbsp;Company Name:</td><td>'.$company_name.'</td>
  </tr>
  <tr>
  <td><i class="fa fa-building"></i>&nbsp;&nbsp;State:</td><td>'.$coverage_state.'</td>
  </tr>
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Location:</td><td>'.$location.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price per hour:</td><td>N'.$amount_per_hour.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price half day:</td><td>N'.$half_day.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price full day</td><td>N'.$full_day.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing fee:</td><td>N'.$processing_fee.'</td>
  </tr>
  
  <tr>
  <td class="submit"><a href="taxi_booking.php?selected_option_id='.$value.'">Book Now</a></td>
  </tr>
 
  </table>
  
  </div>';
  
  }
  }
  }
  ?>
  
  
  </div>
 
  </div>
 
 
<?php require_once "footer.php";?>