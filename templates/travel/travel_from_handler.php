<?php

$from = $_POST['from1'];
$to = $_POST['to1'];
$from_home = htmlspecialchars($_REQUEST['from_home']);
$to_home = htmlspecialchars($_REQUEST['to_home']);


if (isset($_REQUEST['from_home'])) {

    $result = mysql_query("SELECT * FROM travel_details WHERE fromplace='$from_home'  AND toplace='$to_home' ");
} else {
    $result = mysql_query("SELECT * FROM travel_details WHERE fromplace='$from'  AND toplace='$to' ");
}

if (!$result) {
    die("connection failed" . mysql_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (mysql_num_rows($result) == 0) {
        $response = "Sorry there is no available transport company for your destination currently. please check back soon";
        exit;
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
            $stopage = $row["stopage_point"];
            $speed = $row["speed_limit"];
            $time = $row["departure_time"];
            $type = $row["vehicle_type"];
            $lastbus = $row["last_bus_stop"];
            $duration = $row["duration"];
            $processing = $row["processing_fee"];




            echo '<div class="item">
  
   <img src="images/banner-casa.jpg">
  <h2>' . $company_name . '</h2>
  
 <table>

 <tr>
  <td><i class="fa fa-bus"></i>&nbsp;&nbsp;Type:</td><td>' . $type . '</td>
  </tr>
  <tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Price:</td><td>' . $cost . '</td>
  </tr>
  <tr>
 <td><i class="fa fa-building"></i>&nbsp;&nbsp;Park Address:</td><td>' . $address . '</td>
 </tr><tr>
  <td><i class="fa fa-user"></i>&nbsp;&nbsp;Airconditioning:</td><td>' . $aircondition . '</td>
  </tr><tr>
    <td><i class="fa fa-building"></i>&nbsp;&nbsp;Stoppage Points:</td><td>' . $stoppage . '</td>
   </tr><tr>
   <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Time of Departure:</td><td>' . $departure . '</td>
  </tr><tr>
  <td><i class="fa fa-money"></i>&nbsp;&nbsp;Processing fee</td><td>' . $processing . '</td>
  </tr><tr>
  <td class="submit"><a href="book.php?selected_option_id=' . $value . '">Book Now</a></td>
  </tr>
  </table>
  
 </div>';
        }
    }
}
?>

