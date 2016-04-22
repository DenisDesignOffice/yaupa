
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About</title>


<link rel="stylesheet" type="text/css" href="../static/css/about.css"/>
<link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.css"/>
<link rel="shortcut icon" href="/static/images/favicon.ico">
    
<script src="../static/js/modernizr.custom.js"></script>
</head>

<body>





<!--including header files-->
<section>
<?php require_once "header.php";?>
</section>


<section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 </section>
 
 <section class="aboutimg">
 
 </section>
 
 
 
<section class="career">

<h1>About Yaupa</h1>

 
Yaupa is an internet company that connects people to transportation companies; aiding easier transport service. Our web and mobile application helps people find the safest and cheapest transport service available at any area in Nigeria. You can contrast between services of different transport companies and book online using a debit card or bank deposit.
<br/>

Yaupa helps you find the most suited vehicle and price listing to charter to any destination in Nigeria, whether Buses, Lorries, Trucks, Vans, Cooler Vans, Trailers and Pickup Vans.
Yaupa offers a simple way to order a cab to pick you at any location and specified time.

<br/><br/>
<h1>Why Use Yaupa?</h1>  
<h2>Insurance</h2>
The company creates a unique agreement with all transportation companies, comitting them to ensure the delivery of listed services. We act as the insurance policy to customers who book for a trip through Yaupa. Customers are to make complaints if service standard where not met, and are entitled to compensation after cases that resulted to customer's dissatisfaction has been investigated.
<p>
<br/>
<h2> Price Control </h2>
Yaupa offers the best price control system; giving clients a better way of securing their journey at a particular price when they book on time. This means when you book a day or two prior to the traveling date at a particular price, you are not expected to pay any extra charge or price increase due to fuel scarcity or increase in fuel price till your booked contract is terminated.
<p><br/>
<h2>Comparison</h2>
With Yaupa  you can compare the price and services offered by all the companies that commute your destination. This help specify the traveling conditions like speed limit, departure time, airconditioning, stoppage points and last bus stop.
<p>
<br/>

<h2>Payment Methods</h2>
Our payment options are bank deposit and debit card.




</section>
 
 
<?php require_once "footer.php";?>

 </body>
<script src="../static/js/jquery-2.1.3.js"></script>
<script src="../static/js/waypoints.min.js"></script>
<script>
    var $head = $('#ha-header');
    $('.ha-waypoint').each(function (i) {
        var $el = $(this),
                animClassDown = $el.data('animateDown'),
                animClassUp = $el.data('animateUp');

        $el.waypoint(function (direction) {
            if (direction === 'down' && animClassDown) {
                $head.attr('class', 'ha-header ' + animClassDown);
            }
            else if (direction === 'up' && animClassUp) {
                $head.attr('class', 'ha-header ' + animClassUp);
            }
        }, {offset: '100%'});
    });
</script>
</html>

