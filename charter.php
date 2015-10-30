
<!-- Connect to database -->
<?php
require_once "connection.php";
?>


<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter</title>


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

<h1><a href="home.php">Travelin</a></h1>

<nav>

<a href="charter.php">Charter</a>

<a href="travel.php">Travel</a>

<a href="taxi.php">Taxi</a>

</nav>

</div>
</div>
</header>
<section class="charter">
<h1>Search and Charter</h1>
</section>

<section class="form">

<form method="post" action="charter.php">




<label > <i class="fa fa-bus"></i>
<select name="type" class="input-state" >
<option>Select Vehicle Type</option>
<option>Lorry</option>
<option>Bus</option>
<option>Coaster Bus</option>
<option>Trailer</option>
<option>Truck</option>
<option>Pickup Van</option>
<option>Wagon</option>
</select>
</label>

<input type="text" Name="from" value="" placeholder="From?  Pickup point" class="input">



<select type="select" name="location_state" placeholder="State" class="input-state">
<option>Current State</option>
<option>Abia</option>
<option>Adamawa</option>
<option>Akwa-Ibom</option>
<option>Anambra</option>
<option>Bauchi</option>
<option>Bayelsa</option>
<option>Benue</option>
<option>Borno</option>
<option>Cross River</option>
<option>Delta</option>
<option>Edo</option>
<option>Ebonyi</option>
<option>Ekiti</option>
<option>Enugu</option>
<option>Gombe</option>
<option>Kebbi</option>
<option>Kogi</option>
<option>Kano</option>
<option>Imo</option>
<option>Jigawa</option>
<option>Kaduna</option>
<option>Katsina</option>
<option>Kwara</option>
<option>Lagos</option>
<option>Nasarawa</option>
<option>Ondo</option>
<option>Ogun</option>
<option>Osun</option>
<option>Plateau</option>
<option>Rivers</option>
<option>Sokoto</option>
<option>Taraba</option>
<option>Zamfara</option>
<option>Yobe</option>
<option>FCT</option>
</select>

<input type="text" name="to" value="" placeholder="To?  Desired destination" class="input"></td>


<select type="select" value="" placeholder="State" class="input-state">
<option>Destination State</option>
<option>Abia</option>
<option>Adamawa</option>
<option>Akwa-Ibom</option>
<option>Anambra</option>
<option>Bauchi</option>
<option>Bayelsa</option>
<option>Benue</option>
<option>Borno</option>
<option>Cross River</option>
<option>Delta</option>
<option>Edo</option>
<option>Ebonyi</option>
<option>Ekiti</option>
<option>Enugu</option>
<option>Gombe</option>
<option>Imo</option>
<option>Jigawa</option>
<option>Kaduna</option>
<option>Kebbi</option>
<option>Kogi</option>
<option>Kano</option>
<option>Katsina</option>
<option>Kwara</option>
<option>Lagos</option>
<option>Nasarawa</option>
<option>Ondo</option>
<option>Ogun</option>
<option>Osun</option>
<option>Plateau</option>
<option>Rivers</option>
<option>Sokoto</option>
<option>Taraba</option>
<option>Zamfara</option>
<option>Yobe</option>
<option>FCT</option>
</select>

<input type="submit" value="Search" class="input search-text">

</form>
</section>

 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 </section>
 
 <div class="wrapper">
  <div class="masonry">
  
  
  
  
  <!-- Query database for search result -->

<?php

$type=strtolower(htmlspecialchars($_POST['type']));

$state=strtolower(htmlspecialchars($_POST['location_state']));

$result= mysql_query("SELECT * FROM charter WHERE vehicle_type='$type' AND location_state='$state' ");

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

$id=$row['id'];
$to_cost=$row["to_cost"];
$location=$row["location"];
$destination=$row["destination"];
$location_state=$row["location_state"];
$destination_state=$row["destination_state"];
$to_and_fro_cost=$row["to_and_fro_cost"];
$type=$row["vehicle_type"];
$processing_fee=$row["processing_fee"];
$duration=$row["duration"];
$service_hours=$row["service_hours"];
  
  
  echo '
  <div class="item">
  <img src="images/banner-casa.jpg">
  <h2>'.$company_name.'</h2>
  
  <table>
  
  <tr>
  <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td>'.$type.'</td>
  </tr>
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td>'.$to_cost.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;To & Fro Price:</td><td>'.$to_and_fro_cost.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing Fee:</td><td>'.$processing_fee.'</td>
  </tr>
  
  <tr>
  <td><i class="fa fa-building"></i>&nbsp;&nbsp;Car Park</td><td>'.$address.'</td>
  </tr>
  
  <tr>
  <td class="submit"><a href="charter_book.php?selected_option_id='.$value.'">Book Now</a></td>
  </tr>
 
  </table>
  
  </div>';
  
  }
  }
  }
  ?>
  
  
  </div>
  <?php echo $response;?>
  </div>
 
 
 
 <section class="footer">
<div class="text column"><a href="about.php">About Us</div>
<div class="text column"><a href="career.php">Careers</a></div>
<div class="text column">Contact</div><p>
<div class="column copyright"><i class="fa fa-copyright"></i>&nbsp;All Rights Reserved</div>
</section>
 
 

 
</body>
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
</html>
