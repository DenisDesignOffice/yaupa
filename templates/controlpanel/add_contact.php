
<?php 

require_once "../../util/connection.php";

?>



<!DOCTYPE html>
<htm>
<head>
<title>Add Contact Address</title>
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

<form name="add_company" method="post" action="add_contact.php">
<table>
<tr>
<td>Select Company</td>
<td><select type="select" class="input" name="company" required>
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
<td>Location</td>
<td><input type="text" name="location" class="input" required></td>
</tr>

<tr>
<td>
Address</td>
<td><input type="text" name="address" class="input" required></td>
</tr>

<tr>
<td>Phone Number</td>
<td><input type="text" name="phone" class="input" required></td>
</tr>





<tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
</table>
</form>


<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
$location=$_POST['location'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$name = $_POST['company'];


$check=mysql_query("SELECT id FROM transport_companies WHERE company_name='{$name}';");

$row=mysql_fetch_assoc($check);
$id=$row['id'];


$check=mysql_query("SELECT * FROM company_address WHERE company_id='{$id}' AND location='{$location}';");

if(mysql_num_rows($check)==0){

$action="INSERT INTO company_address(company_id, location, address, phone_number) VALUES('$id', '$location', '$address', '$phone')";
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