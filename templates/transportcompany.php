<!DOCTYPE html>

<head>

<title>Transport Company</title>



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
<h1>I HAVE A TRANSPORT COMPANY</h1>
<div>
Our mission is to reach out to every community in the world, serving them with quality and affordable transportation service. Yaupa collaborates with all transportation companies; providing standards and setting conditions that compel transportation companies to deliver quality services at all time.
We welcome you to be our host, so you can reach out and serve millions of people who travel daily. With Yaupa its easy for people to find you, no matter where you are located.
Every host company is our asset, and we do all it takes to promote their business, through advertising personnel development, trainings, daily updates with good market strategies and consultations, all for free. 

</div>
<p><br/>
<h2>HOW DO TRANSPORT COMPANIES RECEIVE PAYMENT </h2>
</p>

<div class="vacancy">

<ul>
 	<li>Each terminal or car park of the transport company is required to provide a minimum of two contact persons, including their phone numbers, email addresses and bank account detail.</li>
 	<li>On successful payment by the user/passenger via yaupa.com, the money is automatically wired to that account provided by the transport company.</li>
 	<li>The passenger personal detail and ticket number will be automatically transferred to the phone number and email address of the contact persons provided.</li>
 	<li>At the end of each working day, a compiled list of transaction is sent via email to each terminal displaying details of all transaction or bookings made.</li>
   
Note: this does not restrict transport companies from manual booking process or issuing of ticket by the transport company.

 </ul>

</div>
<p><br/>

<h2>HOW TO BECOME A HOST</h2>
</p>
<div class="vacancy">
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