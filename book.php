

<?php
require_once "connection.php";

if(!isset($_GET['selected_option_id']))
{
header("location:index.php");
}
?>



<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Form</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/book.css"/>
<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
<script type="text/javascript" src="js/switchery.min.js"></script>


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


 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 <script src="js/jquery-2.1.3.js"></script>
		<script src="js/waypoints.min.js"></script>
		<script>
			var $head = $( '#ha-header' );
			$( '.ha-waypoint' ).each( function(i) {
				var $el = $( this ),
					animClassDown = $el.data( 'animateDown' ),
					animClassUp = $el.data( 'animateUp' );

				$el.waypoint( function( direction ) {
					if( direction === 'down' && animClassDown ) {
						$head.attr('class', 'ha-header ' + animClassDown);
					}
					else if( direction === 'up' && animClassUp ){
						$head.attr('class', 'ha-header ' + animClassUp);
					}
				}, { offset: '100%' } );
			} );
		</script>
 </section>
 
 <section>
 <h1>Booking Form</h1>

<form method="post" action="process.php">
<div class="col-2">
<label>Firstname
<input placeholder="Enter your  complete names" id="firstname" name="firstname" tabindex="1" required />
</label>
</div>
<div class="col-2">
<label>Lastname
<input placeholder="Enter your surname" id="lastname" name="lastname" tabindex="2" required />
</label>
</div>
<div class="col-2">
<label>
Phone Number
<input placeholder="What's the best way to call your" id="phone" name="phone" tabindex="3" required/>
</label>
</div>
<div class="col-3">
<label>
Email
<input placeholder="Enter email address. e.g travlin@yahoo.com" id="email" name="email" tabindex="4" />
</label>
</div>
<div class="col-3">
<label>
Address
<input placeholder="Residential address" id="address" name="address" tabindex="5" required />
</label>
</div>

<div class="col-4">
<label>
Yaupag Date
<input placeholder="dd-mm-yy" id="date" name="date" tabindex="6" required />
</label>
</div>

<div class="col-4">
<label>
Payment Option
<select tabindex="7" name="payment_option" required/>
<option> - </option>
<option>Bank_Deposit</option>
<option>Debit Card</option>
<option>Other</option>
</select>
</label>
</div>

<div class="col-4">
<label>
sms reminder
<center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="8"></center>
</label>
</div>


<div class="col-4">
<label>
Next of Kin
<input placeholder="Name or phone number of next of kin" id="next_of_kin" name="next_of_kin" tabindex="9" />
</label>
</div>







<?php
$value=$_GET['selected_option_id'];

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

} 


?>



<div class="col-5">
<label>
 <i class="fa fa-user"></i>&nbsp;&nbsp;Company:&nbsp;&nbsp;<?php echo $company_name;?>
<hidden value="<?php echo $company;?>" id="company" name="company" tabindex="10" />
</label>
</div>


<div class="col-5">
<label>
 <i class="fa fa-money"></i>&nbsp;&nbsp;Processing fee:&nbsp;&nbsp;<?php echo $processing;?>
<hidden id="company" name="processing_fee" tabindex="11" />
</label>
</div>

<div class="col-5">
<label>
 <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Time of Departure:&nbsp;&nbsp;<?php echo $departure;?>
<type hidden id="next_of_kin" name="departure_time" tabindex="12" />
</label>
</div>


<div class="col-5">
<label>
 <i class="fa fa-building"></i>&nbsp;&nbsp;Stoppage Points:&nbsp;&nbsp;<?php echo  $stopage;?>
<type hidden id="next_of_kin" name="stoppage_points" tabindex="13" />
</label>
</div>


<div class="col-5">
<label>
  <i class="fa fa-user"></i>&nbsp;&nbsp;A C:&nbsp;&nbsp;<?php echo $aircondition;?>
<type hidden id="air_condition" name="air_condition" tabindex="14" />
</label>
</div>

<div class="col-5">
<label>
 <i class="fa fa-building"></i>&nbsp;&nbsp;Park Address:&nbsp;&nbsp;<?php echo $address;?>
<type hidden id="address" name="address" tabindex="15" />
</label>
</div>

<div class="col-5">
<label>
   <i class="fa fa-money"></i>&nbsp;&nbsp;Price:&nbsp;&nbsp;<?php echo $cost;?>
<type hidden id="cost" name="cost" tabindex="16" />
</label>
</div>

<div class="col-5">
<label>
   <i class="fa fa-bus"></i>&nbsp;&nbsp;Type:&nbsp;&nbsp;<?php echo $type;?>
<type hidden id="type" name="type" tabindex="17" />
</label>
</div>
<input type="hidden"  name="selected_option_id"  value="<?php echo $value;?>" /> 

 <div class="col-submit">
    <input type="submit" class="submit" value="Proceed to Payment"/>
  </div>
</form>







<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
 
 </section>

 
 
 
 
<?php require_once "footer.php";?>