<?php       ob_start();
	    session_start();
            session_set_cookie_params(0);
       
            require_once "../../util/connection.php";
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashed_password = crypt($password, '$2a$07$usesomesillystringforsalt$');

                $check = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
                echo $username . " " . $hashed_password . " ";
                $query1 = mysql_query($check);
                echo mysql_num_rows($query1);
                if (mysql_num_rows($query1) != 0) {
                    $_SESSION['user'] = $username;
                    header("location: /templates/controlpanel/cpanel_dashboard.php");
                } else {
                    echo "record does not exist" . mysql_num_rows($query1) ;
                }
                
            }
                
?><!DOCTYPE html">

<head>

<title>Control Panel Login </title>

<link rel="stylesheet" type="text/css" href="../../static/css/cpanel_login.css">
       
        
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