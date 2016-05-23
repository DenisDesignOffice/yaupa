<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "../../util/connection.php";

$from_home = strtolower(htmlspecialchars($_POST['from1']));
$to_home = strtolower(htmlspecialchars($_POST['to1']));

$response = '';

$nby_search = mysql_query("SELECT * FROM nearby_towns where destination LIKE '%$to_home%' OR nearby_town1 LIKE '$to_home'"
        . " OR nearby_town2 LIKE '$to_home' OR nearby_town3 LIKE '$to_home' OR nearby_town4 LIKE '$to_home' "
        . " OR nearby_town5 LIKE '$to_home' OR nearby_town6 LIKE '$to_home' OR nearby_town7 LIKE '$to_home'"
        . " OR nearby_town8 LIKE '$to_home' OR nearby_town9 LIKE '$to_home' OR nearby_town10 LIKE '$to_home'");

        if (mysql_num_rows($nby_search) == 0) {
            $response = "no nearby towns";
        } else {
            while ($row = mysql_fetch_assoc($nby_search)) {
                $town1 = $row["destination"];

                $result = mysql_query("SELECT DISTINCT * FROM travel_services, terminals WHERE from_state='$from_home' "
                        . " AND to_state='$town1' ");

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
                    $sp_tag = $row["tag"];
                    $from_town = $row["from_town"];
                    $to_town = $row["to_town"];


                    $response .= '<div class="item">  
                    <img src="/static/images/banner-casa.jpg">
                    <form method="post" action="./travel_book.php">
                    <h2>' . $company_name . '</h2>
  
                    <table>
                        <tr>
                            <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td id="type" name="type" style="text-align:right">' . $vehicle_type . '</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Route:</td><td id="type" name="type" style="text-align:right; font-weight: bold;">' . $from_town . " - " . $to_town . '</td>
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
						<tr >
                            <td class="submit"><a href="book.php?selected_option_id=' . $value . '">Book Now</a></td>
                        </tr>
						-->
                            <input hidden="true" type="text" id="sp_tag" name="sp_tag" value=' . $sp_tag . '  />
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
                        <td class="submit" ><input type="submit" style="height:100%; width:100%; background-color:transparent; border:0px; color:white" value="Book Now"/></td>
                        </tr> 
                    </table>
                    </form>
  
                </div>';
                }
            }
        }
        
        echo $response;
        
?>
