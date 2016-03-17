
<?php 

session_start(); 



require_once "../../util/connection.php";

?>



<!DOCTYPE html>
<htm>
<head>
<title>Add User</title>
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



<form name="add_company" method="post" action="add_user.php">
<table>


<tr>
<td>Username</td>
<td><input type="text" name="username" class="input" required></td>
</tr>

<tr>
<td>
Password</td>
<td><input type="text" name="password" class="input" required></td>
</tr>


<tr><td></td><td><input class="submit" type="submit" value="Submit"/></td></tr>
</table>
</form>


<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
$username=$_POST['username'];
$password= crypt($_POST['password'], '$2a$07$usesomesillystringforsalt$');



$stuff = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
$do = mysql_query($stuff);
$check =  mysql_num_rows($do);

if($check == 0){

    $action="INSERT INTO users(username, password) VALUES('$username', '$password')";
    $query=mysql_query($action);

    if(!$query)
    {
    die("connection failed".mysql_error());
    }
    echo "Details Added Successfully";
    }
else{

    echo $check;
}

}

?>
</div>
</body>
</html>