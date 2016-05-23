<?php
include './util/connection.php';

switch ($_SERVER['REDIRECT_URL']) {

    default:
        header('HTTP/1.1 404 Not Found');

        $url = $_SERVER['REDIRECT_URL'];
        $array = explode("/", $url);
        $raw_string = strtolower(end($array)); 
        $search_string = substr($raw_string, 0, 4);

        $result = mysql_query("SELECT * FROM travel_services, terminals"
                . " WHERE company LIKE '%$search_string%' AND service_provider=tag ");

        $response = '';

        /* create one master array of the records */

        if (mysql_num_rows($result)) {
            while ($row = mysql_fetch_assoc($result)) {
                $value = $row["id"];
                $company_name = strtoupper($row['company']);
                $address = $row['address'];
                $cost = $row["cost"];
                $from_state = $row["from_state"];
                $to_state = $row["to_state"];
                $aircondition = $row["aircondition"];
                $stoppage_point = $row["stoppage_point"];
                $speed_limit = $row["speed_limit"];
                $departure_time = $row["departure_time"];
                $vehicle_type = $row["vehicle_type"];
                $last_bus_stop = $row["last_bus_stop"];
                $duration = $row["duration"];
                $processing_fee = $row["processing_fee"];
                $departure = $row["departure_time"];


                $response .= '<div class="item">  
                    <img src="/static/images/banner-casa.jpg">
                    <form method="post" action="templates/travel/travel_book.php">
                    <h2>' . $company_name . '</h2>
  
                    <table>
                        <tr>
                            <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td id="type" name="type" style="text-align:right">' . $vehicle_type . '</td>
                        </tr>
                         <tr>
                            <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Destination:</td><td id="type" name="type" style="text-align:right; font-weight: bold;">' . $to_state . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td id="cost" name="cost" style="text-align:right">' . $cost . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-building"></i>&nbsp;&nbsp;Park Address:</td><td id="company_address" name="company_address" style="text-align:right">' . $address . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-user"></i>&nbsp;&nbsp;Airconditioning:</td><td id="aircondition" name="aircondition" style="text-align:right">' . $aircondition . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-building"></i>&nbsp;&nbsp;Stoppage Points:</td><td id="stoppage" name="stoppage" style="text-align:right">' . $stoppage_point . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Time of Departure:</td><td id="departure" name="departure" style="text-align:right">' . $departure_time . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing fee</td><td id="processing" name="processing" style="text-align:right">' . $processing_fee . '</td>
                        </tr>
						
						<!--
						<tr>
                            <td class="submit"><a href="book.php?selected_option_id=' . $value . '">Book Now</a></td>
                        </tr>
						-->
                            <input hidden="true" type="text" id="company_name" name="company_name" value=' . $company_name . '  />                   
                            <input hidden="true" type="text" id="departure" name="departure" value=' . $departure_time . '  />
                            <input hidden="true" type="text" id="aircondition" name="aircondition" value=' . $aircondition . ' />
                            <input hidden="true" type="text" id="type" name="type" value=' . $vehicle_type . '  />    
                            <input hidden="true" type="text" id="cost" name="cost" value=' . $cost . ' />
                            <input hidden="true" type="text" id="stoppage" name="stoppage" value=' . $stoppage_point . '  />
                            <input hidden="true" type="text" id="address" name="address" value=' . $address . ' />
                            <input hidden="true" type="text" id="processing_fee" name="processing_fee" value=' . $processing_fee . '  />
                            <input hidden="true" type="text" id="from_state" name="from_state" value=' . $from_state . '  />
                            <input hidden="true" type="text" id="to_state" name="to_state" value=' . $to_state . '  />       
                             <tr>
                        <td class="submit"><input type="submit" style="height:100%; width:100%; background-color:transparent; border:0px; color:white" value="Book Now"/></td>
                        </tr> 
                    </table>
                    </form>
  
                </div>';
            }
        } else {
            if (!isset($_SESSION['selected_option_id'])) {
                //page not found
                header("location: /index.php");
            }
        }
}
?>

<?php
session_unset()
?>
<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?php echo "Yaupa- " . $raw_string; ?></title>
    <link rel="stylesheet" type="text/css" href="static/css/charter.css"/>
    <link rel="stylesheet" type="text/css" href="static/font-awesome-4.3.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="static/css/form.css"/>
    <link rel="shortcut icon" href="/static/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="preloading/preload.css"/>

    <script src="static/js/modernizr.custom.js"></script>

</head>

<body>

    <?php require_once "templates/header.php"; ?>
    <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">     
    </section>

    <div class="charter">
        <h1>Travel With <?php echo ucfirst($raw_string); ?></h1>
    </div>


    <section class="content">

        <center ><div id="noresult" style=""></div> </center>


        <!-- display search result here -->

        <div class="wrapper">
            <div class="masonry">
                <div style="background: white; width: 100%"> </div>              
                <div id="appendage"><?php echo $response; ?></div><!-- search results will be put in this div -->

            </div>
        </div>


    </section>




    <?php require_once "templates/footer.php"; ?>

</body>
<!-- call the charter form processor -->
<script src="static/js/jquery-2.1.3.js"></script>
<script type="text/javascript" src="static/js/charter_form_handler.js"></script>
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