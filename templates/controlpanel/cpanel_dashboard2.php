<?php session_start();

if(!isset($_SESSION['user'])){
    header("location: /templates/controlpanel/cpanel_login.php");
}

?>


<!DOCTYPE html>
<html>
<head>



<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="/static/css/dashboard.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/static/font-awesome-4.3.0/css/font-awesome.min.css"/>

<link rel="shortcut icon" href="/static/images/favicon.ico">
</head>

<body>

<!-- this div controls the header positioning-->
<div class="header">

    <span id="title"><img src="/static/images/Logo 2.png" height="40"></span>



<!-- the top right menu -->
<div id="topright">

<span id="username">Hi! <?php echo $_SESSION['user']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<span id="logout">Logout</span>
</div>

</div>


<div class="leftmenu">
<ul>
<li><i class="fa fa-bus"></i> <a href="#">Charter Service</a></li>
<li> <i class="fa fa-book"></i><a href="#"> Charter Bookings</a></li>
<li><i class="fa fa-car"></i><a href="#"> Travel Service</a> </li>
<li><i class="fa fa-book"></i><a href="#"> Travel Bookings</a></li>
<li><i class="fa fa-cab"></i> <a href="#">Taxi Service</a></li>
<li><i class="fa fa-book"> </i> <a href="#">Taxi Bookings</a></li>
<li><i class="fa fa-home"> </i> <a href="#">Terminals</a></li>
<li> <i class="fa fa-database"></i><a href="#"> Statistics </a></li>
<li><i class="fa fa-user"></i><a href="#"> Users</a></li>
</ul>
</div>

<div class="contentarea">
</div>

</body>
</html>
