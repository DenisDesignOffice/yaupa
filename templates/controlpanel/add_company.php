
<?php 

require_once "../../util/connection.php";

?>



<!DOCTYPE html>
<htm>
<head>
<title>Add Company</title>
<link rel="stylesheet" type="text/css" href="../../static/css/add_company.css"/>
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
<form name="add_company" method="post" action="add_company.php">
<label>Add New Company
<input class="input" type="text" name="company" required>
</label>
<input class="submit" type="submit" value="Submit">
</form>

<?php 
$error="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
$name=$_POST['company'];

$check=mysql_query("SELECT company_name FROM transport_companies WHERE company_name='{$name}';");

if(mysql_num_rows($check)==0){
$action="INSERT INTO transport_companies(company_name) VALUE('$name')";
$query=mysql_query($action);

if(!$query)
{
die("connection failed".mysql_error());
}
$error="Name has been added Successfully";
}
else
{
$error="Name Already Exist";
}
}

echo "<br/>".$error;

?>
</div>

</body>
</html>