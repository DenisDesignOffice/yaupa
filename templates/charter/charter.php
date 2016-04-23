<?php session_unset() ?>
<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Charter</title>
    <link rel="stylesheet" type="text/css" href="../../static/css/charter.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../static/css/form.css"/>
     <script src="../../static/js/modernizr.custom.js"></script>

    
  


    



</head>

<body>

    <?php require_once "../header.php"; ?>
<section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">     
    </section>

    <div class="charter">
        <h1>Search and Charter</h1>
    </div>


<section class="content">
    <!-- Charter form -->
    <div class="form">

        <form method="post" id="charter_form" action="./charter.php">

            <!-- vehicle selector w -->
            <label > <i class="fa fa-bus"></i>
                <select id="type" name="vehicle_type" class="input-state" >
                    <?php include_once '../../util/constants/vehicles.html'; ?>
                </select>
            </label>

            <input type="text" id="from"   name="from" value="" placeholder="From?  Pickup point" class="input">

            <!-- current state selector -->
            <select type="select" id="location" name="from_state" placeholder="State" class="input-state">
                <option>Current State</option>
                <?php include '../../util/constants/states.html'; ?>
            </select>

            <input type="text" id="to" name="to" value="" placeholder="To?  Desired destination" class="input"></td>

            <!-- destination state selector -->
            <select type="select" id="dest" name="to_state" value="" placeholder="State" class="input-state">
                <option>Destination State</option>
                <?php include '../../util/constants/states.html'; ?>
            </select>

            <input type="submit" value="Search" class="input search-text">

        </form>

    </div>
</section>


    <!-- display search result here -->

    <div class="wrapper">
        <div class="masonry">
            <div style="background: white; width: 100%"> </div>              
            <div id="appendage"></div><!-- search results will be put in this div -->

        </div>
    </div>
   
    <?php require_once "../../templates/footer.php"; ?>

</body>
<!-- call the charter form processor -->
<script type="text/javascript" src="../../static/js/charter_form_handler.js"></script>

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