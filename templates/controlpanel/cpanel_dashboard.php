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
        <!--<script src="/static/js/charter_form_handler.js"></script>-->
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
                    <li id="transportCompaniesBt"><i class="fa fa-building"></i> <a href="?view=transport_companies">Transport Companies</a></li>
                    <li id="charterServiceBt"><i class="fa fa-bus"></i> <a href="?view=charter_services">Charter Service</a></li>
                    <li id="myBtn"> <i class="fa fa-book"></i><a href="?view=charter_bookings"> Charter Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-car"></i><a href="?view=travel_services"> Travel Service</a> </li>
                    <li id="myBtn"><i class="fa fa-book"></i><a href="?view=travel_bookings"> Travel Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-cab"></i> <a href="?view=taxi_services">Taxi Service</a></li>
                    <li id="myBtn"><i class="fa fa-book"> </i> <a href="?view=taxi_bookings">Taxi Bookings</a></li>
                    <li id="myBtn"><i class="fa fa-home"> </i> <a href="?view=terminals">Terminals</a></li>
                    <li id="myBtn"> <i class="fa fa-database"></i><a href="#"> Statistics </a></li>
                    <li id="myBtn"><i class="fa fa-user"></i><a href="?view=users"> Users</a></li>
                </ul>
            </div>

            <!-- this part displays the content of selected options -->
            <div class="contentarea">







                <!-- Transport companies -->
                <?php 
                    if (isset($_GET{'view'})) {
                        $view = strtolower(htmlspecialchars($_GET{'view'}));
                        if ($view == 'transport_companies') {
                            include './transport_companies.php';
                        }else if ($view == 'charter_services'){
                            include './charter_services.php';
                        }else if ($view == 'charter_bookings'){
                            include './charter_bookings.php';
                        }else if ($view == 'travel_services'){
                            include './travel_services.php';
                        }else if ($view == 'taxi_services'){
                            include './taxi_services.php';
                        }else if ($view == 'travel_bookings'){
                            include './travel_bookings.php';
                        }else if ($view == 'taxi_bookings'){
                            include './taxi_bookings.php';
                        }else if ($view == 'terminals'){
                            include './terminals.php';
                        }else if ($view == 'users'){
                            include './users.php';
                        }else if ($view == 'add_charter'){
                            include './cpanel_add_charter.php';
                        }else if ($view == 'add_company'){
                            include './cpanel_add_companies.php';
                        }
                    }else{
                       include './transport_companies.php'; 
                    }
?>

            </div>

            <h5 id="appendage"></h5>
        </div>
        <script src="/static/js/modalform.js"></script>
    </body>
</html>
