<?php

include_once "../../util/connection.php";

$response = '';

$type = strtolower(htmlspecialchars($_POST['type']));
$state = strtolower(htmlspecialchars($_POST['location']));
$dest = strtolower(htmlspecialchars($_POST['dest']));
$to = strtolower(htmlspecialchars($_POST['to']));
$from = strtolower(htmlspecialchars($_POST['from']));

$_SESSION['type'] = $type;
$_SESSION['state'] = $state;
$_SESSION['dest'] = $dest;
$_SESSION['to'] = $to;
$_SESSION['from'] = $from;


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


                $response .= '<form id="book_form" name="book_form" method="post" action="./charter_book.php">
                        <div  class="item">
                        <img src="../../static/images/banner-casa.jpg">
                        <h2 >' . $company_name . '</h2>

                        <table>

                        <tr>
                        <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td>' . $type . '</td>
                        </tr>
                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td id="to_cost" name="to_cost">' . $to_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;To & Fro Price:</td><td id="to_and_fro_cost" name="to_and_fro_cost">' . $to_and_fro_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing Fee:</td><td id="processing_fee" name="processing_fee">' . $processing_fee . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-building"></i>&nbsp;&nbsp;Car Park</td><td id="company_address" name="company_address">' . $address . '</td>
                        </tr>
						
<<<<<<< HEAD
                        <tr>
                        <td class="submit"><input type="submit" value="Book"/></td>
                        </tr> 
                        
                        <input type="text" id="selected_item_id" name="selected_item_id" value=' . $value . ' hidden="true"/>
                        <input type="text" id="company_name" name="company_name" value=' . $company_name . ' hidden="true"/>
                        <input type="text" id="type" name="type" value=' . $type . ' hidden="true"/>    
                        <input type="text" id="to_cost" name="to_cost" value=' . $to_cost . ' hidden="true"/>
                        <input type="text" id="to_and_fro_cost" name="to_and_fro_cost" value=' . $to_and_fro_cost . ' hidden="true"/>
                        <input type="text" id="address" name="address" value=' . $address . ' hidden="true"/>
                        <input type="text" id="processing_fee" name="processing_fee" value=' . $processing_fee . ' hidden="true"/>
			
                        </form>			
=======
						
                        <!-- <tr>
                        <td class="submit"><a href="charter_book.php?selected_option_id=' . $value . '">Book Now</a></td>
                        </tr> -->
						
>>>>>>> 59690b1d8ae3de9c7a780c9730829bd2079c1363

                        </table>

                        </div>';
            }
            echo $response;
        }
    }
}
?>


