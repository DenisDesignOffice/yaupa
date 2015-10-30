<!DOCTYPE html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Careers</title>


<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/icon.css"/>
<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/career.css"/>
<script src="modernizr.custom.js"></script>


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
 </section>
 
<section class="career">
<h1>Career</h1>
<div>
We are committed to adding value to the life of every individual through our product. Our team is small, which makes it easy to know ourselves. We also share a unique culture of love and happiness; we strive for excellence, innovation and creativity. And as such we do not really care about qualification or working experience but keen in developing and making our members become the best in any choosen field. If you feel talented enough, passionate and enthusiastic about making an impact or proving yourself, please don't hesitate to send us your resume.
</div>
<p><br/>
<h2>Vacancies</h2>
</p>
<div class="vacancy">

<ul>
<li>Sales</li>
<li>Marketing</li>
<li>Web Developer</li>
<li>Mobile Developer</li>
<li>Java Programmer</li>
</div>
</section>
 
 
 <section class="footer">
<div class="text column"><a href="about.php">About Us</div>
<div class="text column"><a href="career.php">Careers</a></div>
<div class="text column">Contact</div><p>
<div class="column copyright"><i class="fa fa-copyright"></i>&nbsp;All Rights Reserved</div>
</section>
 
 

 
></body>
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
