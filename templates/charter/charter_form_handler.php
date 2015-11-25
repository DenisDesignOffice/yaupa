<?php

include_once "../../util/connection.php";

$response = '';

$type = strtolower(htmlspecialchars($_POST['type']));
$state = strtolower(htmlspecialchars($_POST['location']));
$dest = strtolower(htmlspecialchars($_POST['dest']));
$to = strtolower(htmlspecialchars($_POST['to']));
$from = strtolower(htmlspecialchars($_POST['from']));


if ($type == "select vehicle type" || $state == "current state") {
    $response = "<h1>Please fill all relevant fields</h1>";
    echo $response;
    exit();
} else {

//all fields were filled, lets process
    $result = mysql_query("SELECT * FROM charter WHERE vehicle_type='$type' AND location_state='$state' ");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (mysql_num_rows($result) == 0) {
            $response = "Sorry there is no available transport company for your destination currently. please check back soon";
            echo $response;
        } else {
            while ($row = mysql_fetch_assoc($result)) {
                $value = $row["company_id"];

                $name = mysql_query("SELECT * FROM transport_companies WHERE id='$value'");
                $ro = mysql_fetch_assoc($name);
                $company_name = $ro['company_name'];

                $name = mysql_query("SELECT * FROM company_address WHERE id='$value'");
                $run = mysql_fetch_assoc($name);
                $address = $run['address'];

                $id = $row['id'];
                $to_cost = $row["to_cost"];
                $location = $row["location"];
                $destination = $row["destination"];
                $location_state = $row["location_state"];
                $destination_state = $row["destination_state"];
                $to_and_fro_cost = $row["to_and_fro_cost"];
                $type = $row["vehicle_type"];
                $processing_fee = $row["processing_fee"];
                $duration = $row["duration"];
                $service_hours = $row["service_hours"];


                $response .= '
                        <div  class="item">
                        <img src="../../static/images/banner-casa.jpg">
                        <h2>' . $company_name . '</h2>

                        <table>

                        <tr>
                        <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td>' . $type . '</td>
                        </tr>
                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td>' . $to_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;To & Fro Price:</td><td>' . $to_and_fro_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing Fee:</td><td>' . $processing_fee . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-building"></i>&nbsp;&nbsp;Car Park</td><td>' . $address . '</td>
                        </tr>
						
						
                        <tr>
                        <td class="submit"><a href="charter_book.php?selected_option_id=' . $value . '">Book Now</a></td>
                        </tr> 
						

                        </table>

                        </div>';
            }
            echo $response;
        }
        
    }
}



?>


