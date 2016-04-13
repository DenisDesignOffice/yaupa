<?php

$to = $_SESSION['email'];
$subject = 'TRANSACTION INFO';
$message = '<!DOCTYPE html ">
<html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yaupa</title>
<style>

body
{
background:white;
}


.container
{
width:50%;
height:60%;
padding:3em;
font-size:14px;
}


#date
{
position:absolute;
left:45%;
}

.transaction
{
padding:2em;
background:#CCCCCC;
line-height:1.8em;
font-weight:bold;
padding-top:0.5em;
font-size:13px;
}

.title
{
display:inline-block;
position:relative;
padding-right:5em;
width:150px;
}



.value
{
display:inline-block;
position:relative;
left:0;
}

.greeting
{
padding:3em;
line-height:1.4em;
padding-left:0;
}

.logo
{position:relative;
left:65%;
padding-bottom:0.5em;
}
</style>
</head>

<body>

<div class="container">

<div class="logo"><img src="../static/images/full_logo.png"/></div>                                                                  
<div class="greeting">
<span>Dear Passenger/Client </span>                               <span id="date"> 25-April-2016</span><br />
<p><br />
Thanks for booking with Yaupa.<br />
Below are your transaction details
</div>


<div class="transaction">
<h3>Transaction Notification</h3>

<div>        <span class="title"> Name: </span>                    <span class="value">Christian Okpakpo</span></div>
<div>  <span class="title">Reference Number: </span>                   <span class="value">  34456567545454</span></div>
        <div><span class="title">  Total Amount:  </span>                 <span class="value">  10,000.00</span></div>
</div>


<div>
<p>Please do not reply this mail.</p>
                                                                                                     
For more details or support call +234 7035 277 717<br />
or visit www.yaupa.com 
</div>
  
  </div>                                     

</body>
</html>
';
$headers = 'From: info@yaupa.com' . "\r\n" .
        'Reply-To: noreply' . "\r\n" .
        'X-Mailer: PHP/' . phpversion() .
        'MIME-Version: 1.0\r\n' .
        'Content-Type: text/html; charset=ISO-8859-1\r\n';

mail($to, $subject, $message, $headers);
?>