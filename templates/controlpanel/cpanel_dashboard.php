<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: /templates/controlpanel/cpanel_login.php");
}

require_once "../../util/connection.php";
?>

<!DOCTYPE html>
<html>
    <head>

        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="/static/css/dashboard.css" />
        <link rel="stylesheet" type="text/css" href="/static/css/modalform.css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css"/>

        <link rel="shortcut icon" href="/static/images/favicon.ico">

        <script src="/static/js/jquery-2.1.3.js"></script>
    </head>

    <body>

        <div class="container">


            <!-- this div controls the header positioning-->
            <div class="header">


                <!-- inserting logo on the header-->
                <span id="logo" ></span>



                <!-- the top right menu -->
                <div id="topright">

                    <span id="username">hi <?php echo $_SESSION['user']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <span id="logout">Logout</span>
                </div>

            </div>


            <!-- Left navigation menu -->
            <div class="leftmenu">
                <ul>
                    <li id="transportCompaniesBt"><i class="fa fa-building"></i> <a href="#">Transport Companies</a></li>
                    <li id="charterServiceBt"><i class="fa fa-bus"></i> <a href="#">Charter Service</a></li>
                    <li id="myBtn"> <i class="fa fa-book"></i><a href="#"> Charter Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-car"></i><a href="#"> Travel Service</a> </li>
                    <li id="myBtn"><i class="fa fa-book"></i><a href="#"> Travel Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-cab"></i> <a href="#">Taxi Service</a></li>
                    <li id="myBtn"><i class="fa fa-book"> </i> <a href="#">Taxi Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-home"> </i> <a href="#">Terminals</a></li>
                    <li id="myBtn"> <i class="fa fa-database"></i><a href="#"> Statistics </a></li>
                    <li id="myBtn"><i class="fa fa-user"></i><a href="#"> Users</a></li>
                </ul>
            </div>

            <!-- this part displays the content of selected options -->
            <div class="contentarea">







                <!-- Transport companies -->
                <?php include './transport_companies.php';?>
                
                <!-- Transport companies -->
                <?php include './charter_services.php';?>


                <!--                <div id="box-container">
                
                                    <div class="slide-box">
                                        <div class="slide-title">Travel Bookings Update</div>
                                    </div>
                                    <div class="slide-box">
                                        <div class="slide-title">Taxi booking Updates  </div>
                                    </div>
                                    <div class="slide-box">
                                        <div class="slide-title">Charter Booking Update</div>
                                    </div>
                                    <div class="slide-box">
                                        <div class="slide-title">Terminal Update </div>
                                    </div>
                
                                    <div class="slide-box">
                                        <div class="slide-title">Newly Added Companies</div>
                                    </div>
                
                                    <div class="slide-box">
                                        <div class="slide-title">Booking Company</div>
                                    </div>
                
                                    <div class="slide-box">
                                        <div class="slide-title">Booking & Update Statistics</div>
                                    </div>
                                    <div class="slide-box">
                                        <div class="slide-title">Manager Upload Activities</div>
                                    </div>
                
                                </div>-->


            </div>


        </div>
        <script src="/static/js/modalform.js"></script>
    </body>
</html>
