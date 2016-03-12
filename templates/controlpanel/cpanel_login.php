<?php
            require_once "../../util/connection.php";
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashed_password = crypt($password);

                $check = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password' ";

                $query1 = mysql_query($check);

                if ($query1) {
                    $_SESSION['user'] = $username;
                    header("location: /templates/controlpanel/controlpanel.php");
                } else {
                    echo "record does not exist";
                }
                
            }
                
?>


<!DOCTYPE html">

<head>

<title>Control Panel Login </title>

<link rel="stylesheet" type="text/css" href="../../static/css/cpanel_login.css">
<link rel="shortcut icon" href="/static/images/favicon.ico">

        <!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
        <!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
        <!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
        <!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
        <!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../../static/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../../static/css/animate-custom.css" />
        
    </head>
    <body>
    
        <div class="container">
            
            <section>				
               
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        <!-- the form action enters here -->
                        
                        <form  name= "login_form"  action="./cpanel_login.php" method="post" autocomplete="on"> 
                            
                                <h1><img src="../../static/images/Logo 2.png" alt="yaupa"></h1> 
                                
                                <p> 
                                    <label for="username" class="uname" data-icon="" > Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="obama@yahoo.com"/>
                                </p>
                                
                                <p> 
                                    <label for="password" class="youpasswd" data-icon=""> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="man$2hattan!" /> 
                                </p>
                                
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">Keep me logged in</label>
				</p>
                                
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
				</p>
                                
                            </form>
                        
                        </div>
                    </div>
                
            </section>
            
            
        </div>
    </body>
</html>