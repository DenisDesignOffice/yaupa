
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home</title>

        <link rel="stylesheet" type="text/css" href="static/css/rotate.css"/>
        <link rel="stylesheet" type="text/css" href="static/font-awesome-4.3.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="static/css/form.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/icon.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/vid.css"/>

        <script src="static/js/modernizr.custom.js"></script>
        
         <script src="static/js/jquery-2.1.3.js"></script>
        <!-- call the travel form processor -->
        <script type="text/javascript" src="static/js/travel_form_handler.js"></script>


    </head>

    <body>

        <!--including the header file-->
        <?php require_once "templates/header.php"; ?>

        <section class="col-3" >
            <video autoplay loop muted poster="static/vids/capture.jpg" id="video-bg"> 
                <source src="static/vids/front.webm" type="video/webm">
                    <source src="static/vids/front.mp4" type="video/mp4">
                        <p>does not support this browser</p>
                        </video>
                        <div class="text column">

                            <h2 class="rw-sentence">
                                Travel the <a class="rw-words rw-words-1">
                                    <span>Safest</span>
                                    <span>Fastest</span>
                                    <span>Cheapest</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </a> &nbsp;&nbsp;&nbsp;Way Across Nigeria </h2>
                            <p1>Charter a bus, taxi, truck, lorry.  Book your next trip</p1>
                        </div>



                        </section>
                        <br><br><br><br><br><br>
                                                <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">

                                                    <h3>See What's Available</h3>
                                                    <div class="pos">



                                                        <form method="post" id="travel_form_home" action="./index.php">


                                                            <input type="text" Name="from_home" value="" placeholder="From? e.g Benin, Owerri" class="input" required>


                                                                <input type="text" name="to_home" value="" placeholder="To? e.g Oyo, Aba" class="input" required>


                                                                    <input type="submit" value="Search" class="input search-text">

                                                                        </form>
                                                                        <p>
                                                                            <h4>Book now, avoid increase due to fuel price</h4>
                                                                            <h4>Use our simple search form to find hundreds of transportation companies going you way</h4>
                                                                            </div>

                                                                            </section>


                                                                            <section class="color">
                                                                                <div class="column pos2">
                                                                                    <span class="icon icon-stack"></span><p>
                                                                                        <h2>Make it Safe</h2>
                                                                                        <p>
                                                                                            Travel safe, make the right decision. Chose from the best available transport companies, compare prices and decide early.
                                                                                        </p>
                                                                                </div>

                                                                                <div class="column pos2">
                                                                                    <span class="icon icon-phone"></span><p>
                                                                                        <h2>Make the Call</h2>
                                                                                        <p>
                                                                                            You can have your taxi at your door step, all you've got to do is click the button
                                                                                            <p>
                                                                                                </div>

                                                                                                <div class="column pos2">
                                                                                                    <span class="icon icon-truck"></span><p>
                                                                                                        <h2>Get All</h2>
                                                                                                        <p>
                                                                                                            Charter a bus, car, truck, lorry, trailer; compare prices and get the best always.
                                                                                                            <p>
                                                                                                                </div>

                                                                                                                </section>

                                                                                                                <?php require_once "templates/footer.php"; ?>

                                                                                                                </body>
                                                                                                                <script src="static/js/jquery-2.1.3.js"></script>
                                                                                                                <script src="static/js/waypoints.min.js"></script>
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
