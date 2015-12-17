
<?php
require_once "../../util/connection.php";
?>



<!DOCTYPE html>
<htm>
    <head>
        <title>Add Travel</title>
        <link rel="stylesheet" type="text/css" href="../../static/css/add_travel.css"/>
    </head>
    <body>
        <div class="header">

            <h1><a href="controlpanel.php">Yaupa Control Panel</a></h1>
            <nav>
                <a>Hi! User</a>
                <a>Logout</a>
            </nav>

        </div>



        <div id="container">

            <form name="add_company" method="post" action="add_travel.php">
                <table>
                    <tr>
                        <td>Service Provider</td>
                        <td><select type="select" class="input" name="company">
                                <?php
                                $action = "SELECT tag FROM terminals";
                                $query = mysql_query($action);
                                while ($row = mysql_fetch_assoc($query)) {
                                    echo "<option>" . $row['tag'] . "</option>";
                                }
                                ?>
                            </select></td>

                    </tr>

                    <tr>
                        <td>Location State</td>
                        <td>
                            <select type="select" class="input" name="from_state">
                                <?php require '../../util/constants/states.html'; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Destination State</td>
                        <td>
                            <select type="select" class="input" name="to_state">
                                <?php require '../../util/constants/states.html'; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Cost</td>
                        <td><input type="text" placeholder="5900" name="cost" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Air Condition</td>
                        <td><input type="text" placeholder="yes or no" name="aircondition" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Stopage Point</td>
                        <td><input type="text" placeholder="uniport, rumo-okoro or none" name="stopage_point" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Speed Limit</td>
                        <td><input type="text" placeholder="80km/hr" name="speed_limit" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Last Bus Stop</td>
                        <td><input type="text" placeholder="mile one park" name="last_bus_stop" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Duration</td>
                        <td><input type="text" placeholder="3hrs" name="duration" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Departure Time</td>
                        <td><input type="text" placeholder="7am" name="departure_time" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Vehicle Type</td>
                        <td>
                            <select type="select" class="input" name="vehicle_type">
                                <?php require '../../util/constants/vehicles.html'; ?>
                            </select>
                        </td>
                    </tr>

                    <tr><td>
                            <label>Processing Fee</td>
                            <td><input type="text" placeholder="300" name="processing_fee" class="input" /required></td>
                        </label>
                    </tr>
                    <tr>
                        <td>Vehicle Picture</td>
                        <td><input type="file" name="picture" class="input"></td>
                    </tr>
                    <tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
                </table>
            </form>


            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $service_provider = $_POST['company'];
                $from_state = $_POST['from_state'];
                $to_state = $_POST['to_state'];
                $cost = $_POST['cost'];
                $aircondition = $_POST['aircondition'];
                $stopage_point = $_POST['stopage_point'];
                $speed_limit = $_POST['speed_limit'];
                $last_bus_stop = $_POST['last_bus_stop'];
                $duration = $_POST['duration'];
                $departure_time = $_POST['departure_time'];
                $vehicle_type = $_POST['vehicle_type'];
                $processing_fee = $_POST['processing_fee'];


                $action = "INSERT INTO travel_services(service_provider, vehicle_type, from_state, to_state, cost, stoppage_point, "
                        . "speed_limit, last_bus_stop, departure_time, duration, processing_fee,  aircondition )"
                        . " VALUES('$service_provider', '$vehicle_type', '$from_state', '$to_state', '$cost', '$stopage_point', '$speed_limit',"
                        . " '$last_bus_stop',  '$departure_time', '$duration',  '$processing_fee', '$aircondition')";
                $query = mysql_query($action);

                if (!$query) {
                    die("connection failed" . mysql_error());
                }
                echo "Details Added Successfully";
            }
            ?>
        </div>
    </body>
</html>