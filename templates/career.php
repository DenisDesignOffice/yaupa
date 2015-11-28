<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>




<link rel="stylesheet" type="text/css" href="../static/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../static/css/form.css"/>


<script src="../static/js/modernizr.custom.js"></script>
<link rel="stylesheet" type="text/css" href="../static/css/career.css"/>

</head>

<body>

<!--including header page-->
<?php require_once "../templates/header.php";?>






 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
 </section>
 
<section class="career">
<h1>Career</h1>
<div>
We are committed to adding value to the life of every individual through our product. Our team is small, which makes it easy to know ourselves. We also share a unique culture of love and happiness; we strive for excellence, innovation and creativity. And as such we do not really care about qualification or working experience but keen in developing and making our members become the best in any choosen field. If you feel talented enough, passionate and enthusiastic about making an impact or proving yourself, please don't hesitate to send your resume to christian@yaupa.com.
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