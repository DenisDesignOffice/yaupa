<?php session_unset() ?>
<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Taxi</title>
    
     <link rel="stylesheet" type="text/css" href="../../static/css/taxi.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.css"/>
  
    <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
    <link rel="shortcut icon" href="/static/images/favicon.ico">
   
    <script src="../../static/js/modernizr.custom.js"></script>

</head>

<body>
    <?php require_once "../header.php"; ?>

    <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
    </section>

    <section>
        <h1>Order for Taxi</h1>

        <form method="post" action="taxi_result.php">
            <div class="col-4">
                <label>From
                    <input placeholder="Your current location / Pickup point" id="from" name="from" tabindex="1" />
                </label>
            </div>
            <div class="col-4">
                <label>State
                    <select tabindex="2" name="location_state"/>
                    <option> - </option>
                    <?php include '../../util/constants/states.html'; ?>
                    </select>
                </label>
            </div>

            <div class="col-4">
                <label>To
                    <input placeholder="Destination or stoppage point" id="to" name="to" tabindex="3" />
                </label>
            </div>

            <div class="col-4">
                <label>State
                    <select tabindex="2" name="destination_state" />
                    <option> - </option>
                    <?php include '../../util/constants/states.html'; ?>
                    </select>
                </label>
            </div>

            <div class="col-5">
                <label>
                    Method of Service
                    <input placeholder="How do you want us to serve you?  Specify or indicate by sliding the options below"  tabindex="5" />
                </label>
            </div>

            <div class="col-4">
                <label>
                    Per Hour
                    <center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="6"></center>
                </label>
            </div>

            <div class="col-4">
                <label>
                    Half Day (4hours)
                    <center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="7"></center>
                </label>
            </div>

            <div class="col-4">
                <label>
                    Full Day (8hours)
                    <center style="position:relative; margin-bottom:0;"><input type="checkbox" class="js-switch" tabindex="8"></center>
                </label>
            </div>



            <div class="col-submit">
                <input type="submit" class="submit" value="Order"/>
            </div>
        </form>


        <script type="text/javascript">
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function (html) {
                var switchery = new Switchery(html);
            });
        </script>

    </section>


<body>
<script src="../../static/js/jquery-2.1.3.js"></script>
        <script src="../../static/js/waypoints.min.js"></script>
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