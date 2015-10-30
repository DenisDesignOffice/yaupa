<?php
require_once "connection.php";

if(!isset($_GET['selected_option_id']))
{
header("location:home.php");
}

?>

<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bank Deposit Form</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
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
 <h1>Bank Deposit Form</h1>

<form method="post" action="taxi_transaction_engine.php">

<div class="col-2">
<label>Firstname
<input placeholder="Enter depositor's firstname" id="firstname2" name="firstname2" tabindex="1" required />
</label>
</div>
<div class="col-2">
<label>Lastname
<input placeholder="Enter depositor's surname" id="lastname2" name="lastname2" tabindex="2" required />
</label>
</div>
<div class="col-2">
<label>
Phone Number
<input placeholder="What's the best way to call you?" id="phone2" name="phone2" tabindex="3" required/>
</label>
</div>
<div class="col-3">
<label>
Amount Paid
<input placeholder="Enter the amount paid" id="amount2" name="amount2" tabindex="4" required/>
</label>
</div>
<div class="col-3">
<label>
Slip No
<input placeholder="Enter the slip number on your payment teller" id="slip_no" name="slip_no" tabindex="5" required />
</label>
</div>

<div class="col-4">
<label>
Date of Payment
<input placeholder="Enter the date you paid" id="date2" name="date2" tabindex="6" required />
</label>
</div>

<div class="col-4">
<label>
Bank
<select tabindex="7" name="bank2" required />
<option> - </option>
<option>Diamond</option>
<option>First Bank</option>
<option>GTB</option>
</select>
</label>
</div>



<div class="col-4">
 <input type="submit" class="submit" value="Confirm"/>
</div>



 <div class="col-submit">
   
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
