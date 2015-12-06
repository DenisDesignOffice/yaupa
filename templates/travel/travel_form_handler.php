<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "../../util/connection.php";

$response = '';


$from_home = strtolower(htmlspecialchars($_POST['from1']));
$to_home = strtolower(htmlspecialchars($_POST['to1']));

if (isset($_POST['from1'])){
    $result = mysql_query("SELECT * FROM travel_details WHERE fromplace='$from_home'  AND toplace='$to_home' ");
}else{
    $result = mysql_query("SELECT * FROM travel_details WHERE fromplace='$from'  AND toplace='$to' ");
}

if (!$result) {
    die("connection failed" . mysql_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (mysql_num_rows($result) == 0) {
        $response = "Sorry there is no available transport company for your destination currently. please check back soon";
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
            $cost = $row["cost"];
            $town = $row["fromplace"];
            $toward = $row["toplace"];
            $aircondition = $row["aircondition"];
            $stoppage = $row["stopage_point"];
            $speed = $row["speed_limit"];
            $time = $row["departure_time"];
            $type = $row["vehicle_type"];
            $lastbus = $row["last_bus_stop"];
            $duration = $row["duration"];
            $processing = $row["processing_fee"];
            $departure = $row["departure_time"];

            $response .= '<div class="item">  
                    <img src="/yaupa.com/static/images/banner-casa.jpg">
                    <form method="post" action="./travel_book.php">
                    <h2>' . $company_name . '</h2>
  
                    <table>
                        <tr>
                            <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td id="type" name="type">' . $type . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td id="cost" name="cost">' . $cost . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-building"></i>&nbsp;&nbsp;Park Address:</td><td id="company_address" name="company_address">' . $address . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-user"></i>&nbsp;&nbsp;Airconditioning:</td><td id="aircondition" name="aircondition">' . $aircondition . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-building"></i>&nbsp;&nbsp;Stoppage Points:</td><td id="stoppage" name="stoppage">' . $stoppage . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Time of Departure:</td><td id="departure" name="departure">' . $departure . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing fee</td><td id="processing" name="processing">' . $processing . '</td>
                        </tr>
						
						<!--
						<tr>
                            <td class="submit"><a href="book.php?selected_option_id=' . $value . '">Book Now</a></td>
                        </tr>
						-->
                                                
                            <input hidden="true" type="text" id="departure" name="departure" value='.$departure.'  />
                            <input hidden="true" type="text" id="aircondition" name="aircondition" value=' . $aircondition . ' />
                            <input hidden="true" type="text" id="type" name="type" value='.$type.'  />    
                            <input hidden="true" type="text" id="cost" name="cost" value='.$cost.' />
                            <input hidden="true" type="text" id="stoppage" name="stoppage" value='.$stoppage.'  />
                            <input hidden="true" type="text" id="address" name="address" value='.$address. ' />
                            <input hidden="true" type="text" id="processing_fee" name="processing_fee" value='.$processing.'  />
                                                

                             <tr>
                        <td class="submit"><input type="submit" value="Book Now"/></td>
                        </tr> 
                    </table>
                    </form>
  
                </div>';
        }
    }
}

echo $response;

?>