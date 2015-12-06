
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

<?php 
$action="SELECT * FROM transport_companies";
$query=mysql_query($action);
?>

<form name="add_company" method="post" action="add_charter.php">
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
<td>Location State</td>
<td><input type="text" name="location_state" class="input"></td>
</tr>

<tr>
<td>
Destination</td>
<td><input type="text" name="destination_state" class="input"></td>
</tr>

<tr>
<td>To Cost</td>
<td><input type="text" name="to_cost" class="input"></td>
</tr>

<tr>
<td>To $ Fro Cost</td>
<td><input type="text" name="to_and_fro" class="input"></td>
</tr>

<tr>
<td>Processing Fee</td>
<td><input type="text" name="processing" class="input"></td>
</tr>

<tr>
<td>Service Hours</td>
<td><input type="text" name="service_hours" class="input"></td>
</tr>


<tr>
<td>Vehicle Type</td>
<td><input type="text" name="vehicle_type" class="input"></td>
</tr>


<td>Vehicle Picture</td>
<td><input type="text" name="picture" class="input"></td>
</tr>
<tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
</table>
</form>


<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
$location_state=$_POST['location_state'];
$destination_state=$_POST['destination_state'];
$to=$_POST['to_cost'];
$to_and_fro=$_POST['to_and_fro'];
$processing=$_POST['processing'];
$service_hours=$_POST['service_hours'];
$vehicle_type=$_POST['vehicle_type'];
$name = $_POST['company'];


$check=mysql_query("SELECT id FROM transport_companies WHERE company_name='{$name}';");

$row=mysql_fetch_assoc($check);
$id=$row['id'];


$check=mysql_query("SELECT * FROM charter WHERE company_id='{$id}' AND location_state='{$location_state}' AND destination_state='{$destination_state}';");

if(mysql_num_rows($check)==0){

$action="INSERT INTO charter(company_id, vehicle_type, location_state, destination_state, to_cost, to_and_fro_cost, processing_fee, service_hours) VALUES('$id', '$vehicle_type', '$location_state', '$destination_state', '$to', '$to_and_fro', '$processing', '$service_hours')";
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