<?php 
    //change this to your email. 
    $firstname = ucfirst($_SESSION['firstname']) ;
    $lastname = ucfirst($_SESSION['lastname']) ;
    $date = $_SESSION['date'] ;
    $trnx_ref = $_SESSION['trans_ref'] ;
    $pin = $_SESSION['pin'] ;
    $amount = $_SESSION['amount_to_pay2'] ;
    
    $to =  $_SESSION['email'] ;
    $from = "yaupa@yaupa.com";
    $subject = "TRANSACTION STATUS";

    //begin of HTML message 
    $message ="
<html> 
	
  <body style=\"background:white;\">

<div style=\"width:50%;
height:60%;
padding:3em;
font-size:14px;\">

<div style=\"position:relative;
left:65%;
padding-bottom:0.5em;\"><img src=\"http://www.yaupa.com/static/images/full_logo.png\"/></div>                                                                  
<div style=\"padding:3em;
line-height:1.4em;
padding-left:0;\">

<span>Dear  $firstname </span>                              
<p><br />Your transaction was successful<br />
Thanks for booking with Yaupa.<br />
</div>



<p>Please do not reply this mail.</p>
                                                                                                     
For more details or support call +234 7035 277 717<br />
or visit www.yaupa.com 
</div>
  
  </div>
  </body>
</html>";
   //end of message 
    

    
    $headers  = "From: $from\r\n"; 
    $headers .= "Content-type: text/html\r\n";

    // now lets send the email. 
    mail($to, $subject, $message, $headers); 

    echo "<center><h5>an email of your transaction details has been sent to your inbox</h5></center>"; 
?>