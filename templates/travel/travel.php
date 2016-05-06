<?php session_unset() ?>
<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Available Companies</title>

    <link rel="stylesheet" type="text/css" media="all" href="../../static/css/travellist.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../static/css/form.css">

    <link rel="shortcut icon" href="/static/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../preloading/preload.css"/>

    <script src="../../static/js/modernizr.custom.js"></script>



</head>

<body >

    <?php require_once "../header.php"; ?>

    <br/><br/>
    <!--search form-->
    <section class="form">
        <form method="post" name="travel_form" id="travel_form" action="./travel.php">

            <input type="text" name="from1" value="<?php if (isset($_POST['from_home'])) echo $_POST['from_home']; ?>" placeholder="From ?  e.g Ibadan, Warri" class="input"></td>
            <input type="text" name="to1" value="<?php if (isset($_POST['from_home'])) echo $_POST['to_home']; ?>" placeholder="To ?  e.g Aba, portharcourt" class="input"></td>

            <input type="submit" value="Search" class="input search-text"></td>
        </form>

        <!--search result code-->
        <div  class="wrapper">
            <div class="masonry">

                <!-- Query database for search result -->
                <div id="appendage"></div>


            </div>
        </div>

    </section>


    <section id="myModal" class="modal">

        <div class="hs-wrapper">
            <img src="../../preloading/images/1.jpg" alt="image01"/>
            <img src="../../preloading/images/2.jpg" alt="image02"/>
            <img src="../../preloading/images/3.jpg" alt="image03"/>
            <img src="../../preloading/images/4.jpg" alt="image04"/>
            <img src="../../preloading/images/5.jpg" alt="image05"/>
            <img src="../../preloading/images/6.jpg" alt="image06"/>
            <img src="../../preloading/images/7.jpg" alt="image07"/>
            <img src="../../preloading/images/8.jpg" alt="image08"/>

            <div class="caption">
                <span> <strong>Loading...</strong></span>
            </div>
        </div>

    </section>


    <?php require_once "../footer.php" ?>


</body>


<!-- call the travel form processor -->
<script src="../../static/js/jquery.js"></script>
<script src="../../static/js/jquery-2.1.3.js"></script>
<script type="text/javascript" src="../../static/js/travel_form_handler.js"></script>
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