

<?php
require_once "connection.php";
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
 <h1>Taxi Booking Form</h1>

<form method="post" action="taxi_process.php">
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
<input placeholder="What's the best way to call your" id="phone" name="phone" tabindex="3" required />
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
<input placeholder="Residential address" id="address" name="address" tabindex="5" required/>
</label>
</div>

<div class="col-4">
<label>
Pickup Date
<input placeholder="dd-mm-yy" id="date" name="date" tabindex="6" required />
</label>
</div>

<div class="col-4">
<label>
Payment Option
<select tabindex="7" name="payment_option"/ required>
<option> - </option>
<option>Bank_Deposit</option>
<option>Debit Card</option>
<option>Other</option>
</select>
</label>
</div>

<div class="col-4">
<label>
Pickup Time
<input type="text" name="pickup_time" placeholder="What time? eg. 8:30am/pm" tabindex="8" required>
</label>
</div>

<div class="col-4">
<label>
Pickup Point?
<input type="text" placeholder="Where? e.g Area 11 Garki" tabindex="7" name="pickup_point" required/>


</select>
</label>
</div>







<?php
$value=$_GET['selected_option_id'];




?>





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

 
 
 
 
 <section class="footer">
<div class="text column"><a href="about.php">About Us</div>
<div class="text column"><a href="career.php">Careers</a></div>
<div class="text column">Contact</div><p>
<div class="column copyright"><i class="fa fa-copyright"></i>&nbsp;All Rights Reserved</div>
</section>
 
 

 
 





></body>

</html>
