<?php
session_start();

if(!isset($_GET['selected_option_id']))
{
header("location:index.php");
}

?>






<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bank Deposit Form</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/ticket.css" />
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
 
 <div class="ticket">
 <?php
$pin=$_SESSION['pin'];
$serial=$_SESSION['serial'];
$nam1=ucfirst($_SESSION['firstname']);
$nam2=ucfirst($_SESSION['lastname']);
$company=$_SESSION['company_name'];
$date=$_SESSION['date'];
$location=$_SESSION['location'];
$destination=$_SESSION['destination'];
$time=$_SESSION['time'];

if($_SESSION['pending']=="yes")
{
echo "Congratulations! your payment was successful.";
echo '<div class="detail">';
echo 'Hello '.$nam1.'! your transaction is under processing. We will send you your pin and serial number once your deposit has been verified. Please do keep your phone on.';

echo "</div>";

}
else
{
echo "Congratulations! your payment was successful.";
echo '<div class="detail">';
$name=$nam1." ".$nam2;

echo '<table><tr>';

 echo '<td class="make">Pin:</td><td> '.$pin.'</td></tr>
 <tr><td class="make">Serial No:</td><td>'.$serial.'</td></tr>
  <tr><td class="make">Pickup Time:</td><td>'.$time.'</td></tr>
 <tr><td class="make">Name:</td> <td> '.$name.'</td>
 </tr>

<tr>
 <td class="make">Company: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> '.$company.'</td></tr>
 <tr><td class="make">Date:</td><td>'.$date.'</td></tr>
 <tr><td class="make">From:</td> <td> '.$location.' - '.$destination.'</td>
 </tr></table>';


echo "</div>";

}
?>
 </div>

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
</body>

</html>
