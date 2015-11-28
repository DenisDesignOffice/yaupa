
<?php 

require_once "connection.php";

?>



<!DOCTYPE html>
<htm>
<head>
<title>Add Travel</title>
<link rel="stylesheet" type="text/css" href="css/add_travel.css"/>
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

<?php 
$action="SELECT * FROM transport_companies";
$query=mysql_query($action);
?>

<form name="add_company" method="post" action="add_travel.php">
<table>
<tr>
<td>Select Company</td>
<td><select type="select" class="input" name="company">
<?php 
$action="SELECT company_name FROM transport_companies";
$query=mysql_query($action);
while($row=mysql_fetch_assoc($query))
{
echo "<option>".$row['company_name']."</option>";
}
?>
</select></td>

</tr>

<tr>
<td>From</td>
<td><input type="text" name="from" class="input"></td>
</tr>

<tr>
<td>
To</td>
<td><input type="text" name="to" class="input"></td>
</tr>

<tr>
<td>Cost</td>
<td><input type="text" name="cost" class="input"></td>
</tr>

<tr>
<td>Air Condition</td>
<td><input type="text" name="aircondition" class="input"></td>
</tr>

<tr>
<td>Stopage Point</td>
<td><input type="text" name="stopage_point" class="input"></td>
</tr>

<tr>
<td>Speed Limit</td>
<td><input type="text" name="speed_limit" class="input"></td>
</tr>

<tr>
<td>Last Bus Stop</td>
<td><input type="text" name="last_bus_stop" class="input"></td>
</tr>

<tr>
<td>Duration</td>
<td><input type="text" name="duration" class="input"></td>
</tr>

<tr>
<td>Departure Time</td>
<td><input type="text" name="departure_time" class="input"></td>
</tr>

<tr>
<td>Vehicle Type</td>
<td><input type="text" name="vehicle_type" class="input"></td>
</tr>

<tr><td>
<label>Processing Fee</td>
<td><input type="text" name="processing_fee" class="input"></td>
</label>
</tr>
<tr>
<td>Vehicle Picture</td>
<td><input type="text" name="picture" class="input"></td>
</tr>
<tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
</table>
</form>


<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
$name=$_POST['company'];
$from=$_POST['from'];
$to=$_POST['to'];
$cost=$_POST['cost'];
$aircondition=$_POST['aircondition'];
$stopage_point=$_POST['stopage_point'];
$speed=$_POST['speed_limit'];
$last_stop=$_POST['last_bus_stop'];
$duration=$_POST['duration'];
$departure=$_POST['departure_time'];
$vehicle=$_POST['vehicle_type'];
$processing=$_POST['processing_fee'];


$check=mysql_query("SELECT id FROM transport_companies WHERE company_name='{$name}';");

$row=mysql_fetch_assoc($check);
$id=$row['id'];


$check=mysql_query("SELECT * FROM travel_details WHERE company_id='{$id}' AND fromplace='{$from}' AND toplace='{$to}';");

if(mysql_num_rows($check)==0){

$action="INSERT INTO travel_details(company_id, fromplace, toplace, cost, aircondition, stopage_point, speed_limit, last_bus_stop, duration, departure_time, vehicle_type, processing_fee) VALUES('$id', '$from', '$to', '$cost', '$aircondition', '$stopage_point', '$speed', '$last_stop', '$duration', '$departure', '$vehicle', '$processing')";
$query=mysql_query($action);

if(!$query)
{
die("connection failed".mysql_error());
}
echo "Details Added Successfully";
}
else{

echo "Details Already Exist";
}

}

?>
</div>
</body>
</html>