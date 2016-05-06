<?php 
    //change this to your email. 
    $firstname = $_SESSION['firstname'] ;
    $lastname = $_SESSION['lastname'] ;
    $date = $_SESSION['date'] ;
    $trnx_ref = $_SESSION['pin'] ;
    $trnx_ref = $_SESSION['trans_ref'] ;
    $amount = $_SESSION['amount_to_pay2'] ;
    
    $to =  $_SESSION['email'] ;
    $from = "YAUPA";
    $subject = "TRANSACTION REPORT";

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
<p><br />
Thanks for booking with Yaupa.<br />
Below are your transaction details
</div>


<div style=\"padding:2em;
background:#CCCCCC;
line-height:1.8em;
font-weight:bold;
padding-top:0.5em;
font-size:13px;\">

<h3>Transaction Notification</h3>

<div>       

<span style=\"display:inline-block;
position:relative;
padding-right:5em;
width:150px;\"> Name: </span>   

<span style=\"display:inline-block;
position:relative;
left:0;\"> $lastname  $firstname </span></div>

<div>  <span style=\"display:inline-block;
position:relative;
padding-right:5em;
width:150px;\">Reference Number: </span> 

<span style=\"display:inline-block;
position:relative;
left:0;\">  $trnx_ref </span></div>
                  
<div><span style=\"display:inline-block;
position:relative;
padding-right:5em;
width:150px;\">  Total Amount:  </span>  
        
<span style=\"display:inline-block;
position:relative;
left:0;\">   $amount </span></div>


<div><span style=\"display:inline-block;
position:relative;
padding-right:5em;
width:150px;\">  Date:  </span>  
        
<span style=\"display:inline-block;
position:relative;
left:0;\">   $date </span></div>
</div>

<div><span style=\"display:inline-block;
position:relative;
padding-right:5em;
width:150px;\">  Pin:  </span>  
        
<span style=\"display:inline-block;
position:relative;
left:0;\">   $pin </span></div>
</div>



</div>




<div>
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

    
?>