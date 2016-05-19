<?php

session_start(); 

include_once "../../util/connection.php";

If(!isset($_POST['vehicle_type']) || !isset($_POST['from_state']) || !isset($_POST['to_state'])){
    header("location: /index.php");
}

$response = '';

$vehicle_type = strtolower(htmlspecialchars($_POST['vehicle_type']));
$from_state = strtolower(htmlspecialchars($_POST['from_state']));
$to_state = strtolower(htmlspecialchars($_POST['to_state']));
$to = strtolower(htmlspecialchars($_POST['to']));
$from = strtolower(htmlspecialchars($_POST['from']));

$_SESSION['vehicle_type'] = $vehicle_type;
$_SESSION['from_state'] = $from_state;
$_SESSION['to_state'] = $to_state;
$_SESSION['to'] = $to;
$_SESSION['from'] = $from;


if ($to_state == "destination state" || $from_state == "current state") {
    $response = "<h1>Please fill all relevant fields</h1>";
    echo $response;
    exit();
} else {

//all fields were filled, lets process
    $result = mysql_query("SELECT DISTINCT * FROM charter_services, terminals  WHERE to_state='$to_state' AND from_state='$from_state' AND service_provider=tag ");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (mysql_num_rows($result) == 0) {
            $response = "<h1>Sorry there is no available transport company for your destination currently. please check back soon</h1>";
            echo $response;
        } else {
            while ($row = mysql_fetch_assoc($result)) {
                $company_name = strtoupper($row['company']);
                $address = ucfirst($row['address']);
                $to_cost = ucfirst($row["to_cost"]);
                $to_state = ucfirst($row["to_state"]);
                $from_state = ucfirst($row["from_state"]);
                $to = ucfirst($row["to_town"]);
                $from = ucfirst($row["from_town"]);
                $to_and_fro_cost = ucfirst($row["to_and_fro_cost"]);
                $vehicle_type = ucfirst($row["vehicle_type"]);
                $processing_fee = ucfirst($row["processing_fee"]);
                $duration = ucfirst($row["duration"]);
                $tag = $row["tag"];


                $response .= '<form id="book_form" name="book_form" method="post" action="./charter_book.php">
                        <div  class="item">
                        <img src="../../static/images/banner-casa.jpg">

                        <table>

                        <tr>
                        <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td style="text-align:right">' . $vehicle_type . '</td>
                        </tr>
                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td id="to_cost" name="to_cost" style="text-align:right">' . $to_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;To & Fro Price:</td><td id="to_and_fro_cost" name="to_and_fro_cost" style="text-align:right">' . $to_and_fro_cost . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing Fee:</td><td id="processing_fee" name="processing_fee" style="text-align:right">' . $processing_fee . '</td>
                        </tr>

                        <tr>
                        <td><i class="fa fa-building"></i>&nbsp;&nbsp;Car Park</td><td id="company_address" name="company_address" style="text-align:right">' . $address . '</td>
                        </tr>
			
                            <input hidden="true" type="text" id="company_name" name="company_name" value=' . $company_name . ' />
                            <input hidden="true" type="text" id="type" name="type" value=' . $vehicle_type . ' />    
                            <input hidden="true" type="text" id="to_cost" name="to_cost" value=' . $to_cost . ' />
                            <input hidden="true" type="text" id="to_and_fro_cost" name="to_and_fro_cost" value=' . $to_and_fro_cost . ' />
                            <input hidden="true" type="text" id="address" name="address" value=' . $address . ' />
                            <input hidden="true" type="text" id="processing_fee" name="processing_fee" value=' . $processing_fee . ' />
                            <input hidden="true" type="text" id="service_provider" name="service_provider" value=' . $tag. ' />

                        <tr>
                        <td class="submit"><input type="submit" style="height:100%; width:100%; background-color:transparent; border:0px; color:white" value="Book"/></td>
                        </tr> 
                        
                            
			
                        </form>			
						
                        </table>

                        </div>';
            }
            echo $response;
        }
    }
}
?>
