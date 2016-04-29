<!DOCTYPE html>

<head>

<title>User Terms & Conditions</title>



<link rel="stylesheet" type="text/css" href="../static/css/userterms.css"/>
<link rel="stylesheet" type="text/css" href="../static/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.css"/>
<link rel="shortcut icon" href="/static/images/favicon.ico">


<script src="../static/js/modernizr.custom.js"></script>


</head>

<body>

<!--including header page-->
<?php require_once "../templates/header.php";?>






 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 </section>
 
<section class="career">
<h1>USER TERMS AND CONDITIONS</h1>
<div>

<ul>
 	<li>Passengers are to make complaints to our support center in case of dissatisfaction and should state in detail the events that led to their discomfort. They are also to wait while we conduct investigation on their case. They are liable for compensation of 3% interest of any amount paid initially for travel bookings or charter if cases fall in favour
 of them.</li><br/>
 
 	<li>	Customers are guaranteed of their money back and 3% interest on the amount paid if transport companies fail to deliver services required 40mins after the agreed time. However this condition is not subject to cases of unforeseen circumstances like traffic and other disasters.</li><br/>
 	<li>
 	Transport companies will not be held responsible if any customer fail to show up early before the agreed departure time, and are not entitled to any refund of money. Customers are hereby advised to be at the park or bus terminal 40mins before departure time.</li><br/>
 	<li>Customers are restricted to the size of luggage specified by the transport company, in the case of extra luggage, we will not take responsibility. Hence, customers are to negotiate with transport companies.</li><br/>
 	<li>In the absence of unforeseen disaster, customers are expected to be at their destination at the time stipulated; however this may not be accurate always.</li>
</ul>
</div>

</section>
 
 <?php require_once "../templates/footer.php";?>
 
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