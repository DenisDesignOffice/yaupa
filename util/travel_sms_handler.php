<?php

$json_url = "http://api.ebulksms.com:8080/sendsms.json";
$xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
$username = '';
$apikey = '';



if (isset($_SESSION['sms_reminder'])) {

    $username = 'kenneth.ngedo@gmail.com';
    $apikey = 'ad581d548f884e1b571e213e169838064337ccbe';
    $sendername = substr('YAUPA', 0, 11);
    $recipients = $_SESSION['phone'];
    $message = 'Hello ' . ucfirst($_SESSION['firstname']) . ', your transaction to travel with ' . ucfirst($_SESSION['company_name']) .
            ' transport company was successful with ticket number ' . $_SESSION['pin'] .
            '. You are adviced to arive at the terminal 30 mins before ' . $_SESSION['departure'] . ' on ' . $_SESSION['date'] . '. Thanks.'   ;
    $flash = 0;
    if (get_magic_quotes_gpc()) {
        $message = stripslashes($_POST['message']);
    }
    $message = substr($message, 0, 160);
    #Use the next line for HTTP POST with JSON
    $result = useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);

//    echo $result;
} 

function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
    $gsm = array();
    $country_code = '234';
    $arr_recipient = explode(',', $recipients);
    foreach ($arr_recipient as $recipient) {
        $mobilenumber = trim($recipient);
        if (substr($mobilenumber, 0, 1) == '0') {
            $mobilenumber = $country_code . substr($mobilenumber, 1);
        } elseif (substr($mobilenumber, 0, 1) == '+') {
            $mobilenumber = substr($mobilenumber, 1);
        }
        $generated_id = uniqid('int_', false);
        $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
    }
    $message = array(
        'sender' => $sendername,
        'messagetext' => $messagetext,
        'flash' => "{$flash}",
    );

    $request = array('SMS' => array(
            'auth' => array(
                'username' => $username,
                'apikey' => $apikey
            ),
            'message' => $message,
            'recipients' => $gsm
    ));
    $json_data = json_encode($request);
    if ($json_data) {
        $response = doPostRequest2($url, $json_data, array('Content-Type: text/json'));
        $result = json_decode($response);
        return $result;
    } else {
        return false;
    }
}



function doPostRequest2($url, $data, $headers) {
    // Create the context for the request
    $context = stream_context_create(array(
        'http' => array(
            // http://www.php.net/manual/en/context.http.php
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n",
            'content' => $data
        )
    ));

// Send the request
    $response = file_get_contents($url, FALSE, $context);

// Check for errors
    if ($response === FALSE) {
        die('Error');
    }

// Decode the response
    $responseData = json_decode($response, TRUE);

// Print the date from the response
    
}


?>
