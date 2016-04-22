<!DOCTYPE html>

<head>

<title>Taxi Company</title>



<link rel="stylesheet" type="text/css" href="../static/css/transportcompany.css"/>
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
<h1>I HAVE A TAXI</h1>
<div>


Join thousands of taxi drivers to offer professional services anywhere in Nigeria. To become a host complete the following

<ul>
 	<li>Download our  terms and conditions</li>
 	<li>Provide complete detail of transportation charges, and all necessary requirements by Yaupa.</li>
 	<li>Provide a copy of certificate of incorporation or Proof of membership to any Union of road transport workers.</li>
 	<li>Send completed documents  to sales@yaupa.com</li>
 	<li>Pay a non-refundable fee of N5, 000 for registration to the account number that will be sent to you.</li>
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