
<!-- Connect to database -->
<?php
require_once "connection.php";
?>

<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taxi</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/taxi.css"/>
<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
<script type="text/javascript" src="js/switchery.min.js"></script>


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
 <h1>Order for Taxi</h1>

<form method="post" action="taxi_result.php">
<div class="col-4">
<label>From
<input placeholder="Your current location / Pickup point" id="from" name="from" tabindex="1" />
</label>
</div>
<div class="col-4">
<label>State
<select tabindex="2" name="location_state"/>
<option> - </option>
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
</label>
</div>

<div class="col-4">
<label>To
<input placeholder="Destination or stoppage point" id="to" name="to" tabindex="3" />
</label>
</div>

<div class="col-4">
<label>State
<select tabindex="2" name="destination_state" />
<option> - </option>
<option>Select State</option>
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
</label>
</div>

<div class="col-5">
<label>
Method of Service
<input placeholder="How do you want us to serve you?  Specify or indicate by sliding the options below"  tabindex="5" />
</label>
</div>

<div class="col-4">
<label>
Per Hour
<center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="6"></center>
</label>
</div>

<div class="col-4">
<label>
Half Day (4hours)
<center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="7"></center>
</label>
</div>

<div class="col-4">
<label>
Full Day (8hours)
<center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="8"></center>
</label>
</div>



 <div class="col-submit">
    <input type="submit" class="submit" value="Order"/>
  </div>
</form>


<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
 
 </section>


 
 
 
 
 <section class="footer">
<div class="text column"><a href="about.php">About Us</div>
<div class="text column"><a href="career.php">Careers</a></div>
<div class="text column">Contact</div><p>
<div class="column copyright"><i class="fa fa-copyright"></i>&nbsp;All Rights Reserved</div>
</section>
 

 
 





></body>

</html>
