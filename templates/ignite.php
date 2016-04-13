<!DOCTYPE html>

<head>

<title>Transport Company</title>



<link rel="stylesheet" type="text/css" href="../static/css/ignite.css"/>
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
 
 <section class="careerimg">
 <h1>Living for Tomorrow</h1>
 </section>
<section class="career">
<h1>Yaupa Ignite</h1>
<div>

The future like many will define is the promise tomorrow holds, or better days ahead. We define the future to be now. Our present condition is a function of our past activities and believes. Creating a better tomorrow which many call the future means having a productive today.
Yaupa Ignite is a programme that gives the young people a better today, getting them ready for tomorrow, through Software and Design. Our objective is simple "Create an army of Software Engineers and outstanding Designers; secure a position in the technology market by creating quality world standard software and create employment opportunity by taking advantage of globalization".
The programme was initiated on 14th March 2016 and is supported by ShadowsMedia, 3Lessons, Yaupa, Raypower, AIT and other freelance software developers.
Yaupa Ignite is also an accelerator for young Nigerians who want to explore the digital space, and create wealth generating ideas. The programme holds comprehensive training every four months for free.


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