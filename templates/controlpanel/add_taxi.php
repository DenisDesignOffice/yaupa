
<?php 

require_once "connection.php";

?>



<!DOCTYPE html>
<htm>
<head>
<title>Add Taxi</title>
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
<td>Coverage State</td>
<td><input type="text" name="coverage_state" class="input" required></td>
</tr>

<tr>
<td>
Amount Per Hour</td>
<td><input type="text" name="amount_per_hour" class="input" required></td>
</tr>

<tr>
<td>Amount Half Day</td>
<td><input type="text" name="amount_half_day" class="input" required></td>
</tr>

<tr>
<td>Amount Full Day</td>
<td><input type="text" name="amount_full_day" class="input" required></td>
</tr>

<tr>
<td>Location</td>
<td><input type="text" name="processing" class="input" required></td>
</tr>

<tr>
<td>Coverage Distance</td>
<td><input type="text" name="coverage_distance" class="input" required></td>
</tr>


<tr>
<td>Processing Fee</td>
<td><input type="text" name="processing" class="input" required></td>
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
$coverage_state=$_POST['coverage_state'];
$amount_per_hour=$_POST['amount_per_hour'];
$amount_half_day=$_POST['amount_half_day'];
$amount_full_day=$_POST['amount_full_day'];
$location=$_POST['location'];
$processing=$_POST['processing'];
$vehicle_type=$_POST['vehicle_type'];
$coverage_distance=$_POST['coverage_distance'];



$check=mysql_query("SELECT id FROM transport_companies WHERE company_name='{$name}';");

$row=mysql_fetch_assoc($check);
$id=$row['id'];


$check=mysql_query("SELECT * FROM charter WHERE company_id='{$id}' AND coverage_state='{$coverage_state}';");

if(mysql_num_rows($check)==0){

$action="INSERT INTO taxi(company_id, coverage_state, amount_per_hour, amount_half_day, amount_full_day, location, coverage_distance, processing_fee) VALUES('$id', '$coverage_state', '$amount_per_hour', '$amount_half_day', '$amount_full_day', '$location','$coverage_distance', '$processing', )";
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