<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="shortcut icon" href="/static/images/favicon.ico">
            <title>Response</title>
    </head>

    <body>

        <?php
        if (!isset($_SESSION['trans_ref']) || !isset($_SESSION['amount_to_pay']) || !isset($_SESSION['type'])) {
            header("location: /yaupa.com/index.php");
        }

        include_once "../../util/connection.php";
        $param = array();
        $param['productid'] = 6205;
        $param['transactionreference'] = $_SESSION['trans_ref'];
        $param['amount'] = $_SESSION['amount_to_pay'];


        $mac_key = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
        $raw_value = $param['productid'] . $param['transactionreference'] . $mac_key;
        $hash_value = hash('sha512', $raw_value);

        $url = "https://stageserv.interswitchng.com/test_paydirect/api/v1/gettransaction.xml?productid=" . $param['productid'] . "&transactionreference=" . $param['transactionreference']
                . "&amount=" . $param['amount'];

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Hash: " . $hash_value
            )
        );

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        $response = file_get_contents($url, true, $context); //done
        $xml = simplexml_load_string($response);
        ?>
        <h1>Response</h1>

        <?php
        if ((string) $xml->ResponseCode == 00) {

            $sql = "UPDATE charter_bookings SET status='success' WHERE reg_pin='" . $_SESSION['trans_ref'] . "'";
            mysql_query($sql);

            include '../../util/sms_handler.php';
            include '../../util/success_email_handler.php';
            include '../../util/email_handler.php';
            include './charter_ticket.php';
            
        } else {
            include '../../util/failure_email_handler.php';
            include '../../util/email_handler.php';
            echo "<div class='trans_failure'><h4>Your transaction was not succesful.</h4>"
            . "<h4> Reason: " . (string) $xml->ResponseDescription . "</h4>"
            . "<h4>Transaction reference:" . $param['transactionreference'] . "</h4></div>";
        }
        ?>
        <a href="/index.php"><h4>return to home page</h4></a>
    </body>
</html>