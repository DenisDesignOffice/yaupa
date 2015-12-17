
<?php
require_once "../../util/connection.php";
?>



<!DOCTYPE html>
<htm>
    <head>
        <title>Add Charter</title>
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

            <form name="add_company" method="post" action="add_charter.php">
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
                        <td>Location Town</td>
                        <td><input type="text" name="from_town" class="input" /required></td>
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
                        <td>Destination Town</td>
                        <td><input type="text" name="to_town" class="input" /required></td>
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
                        <td>To Cost</td>
                        <td><input type="text" placeholder="5500" name="to_cost" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>To $ Fro Cost</td>
                        <td><input type="text" placeholder="8500" name="to_and_fro_cost" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Processing Fee</td>
                        <td><input type="text" placeholder="500" name="processing_fee" class="input" /required></td>
                    </tr>

                    <tr>
                        <td>Service Hours</td>
                        <td><input type="text" name="duration" class="input" /required></td>
                    </tr>


                    <tr>
                        <td>Vehicle Type</td>
                        <td><input type="text" name="vehicle_type" class="input" /required></td>
                    </tr>


<!--<td>Vehicle Picture</td>
<td><input type="text" name="picture" class="input"></td>-->
                    </tr>
                    <tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
                </table>
            </form>


            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $from_state = $_POST['from_state'];
                $to_state = $_POST['to_state'];
                $from_town = $_POST['from_town'];
                $to_town = $_POST['to_town'];
                $to_cost = $_POST['to_cost'];
                $to_and_fro_cost = $_POST['to_and_fro_cost'];
                $processing_fee = $_POST['processing_fee'];
                $duration = $_POST['duration'];
                $vehicle_type = $_POST['vehicle_type'];
                $name = $_POST['company'];

                $check = "SELECT * FROM charter_services WHERE service_provider='$service_provider' AND vehicle_type='$vehicle_type' "
                        . "from_state='$from_state' AND to_state='$to_state' AND to_town='$to_town' AND from_town='$from_town'";

                $query1 = mysql_query($check);

                if (!$query1) {

                    $action = "INSERT INTO charter_services(service_provider, vehicle_type, from_state, to_state, from_town, to_town, to_cost, to_and_fro_cost, processing_fee, duration)"
                            . " VALUES('$name', '$vehicle_type', '$from_state', '$to_state', '$from_town', '$to_town','$to_cost', '$to_and_fro_cost', '$processing_fee', '$duration') "
                            . "";
                    $query = mysql_query($action);

                    if (!$query) {
                        die("connection failed" . mysql_error());
                    }
                    echo "Details Added Successfully";
                } else {
                    echo "Details Already Exist";
                }
            }
                ?>
        </div>
    </body>
</html>