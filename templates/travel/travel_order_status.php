<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="/static/images/favicon.ico">
            <!--<link rel="stylesheet" type="text/css" media="print" href="/static/css/print.css" />-->
            <title>Response</title>
            
    </head>

    <body>

        <?php
        if (!isset($_SESSION['trans_ref'])) {
            header("location: /index.php");
        }
        include_once "../../util/connection.php";

        $param = array();
        $param['productid'] = 6410;
        $param['transactionreference'] = $_POST['txnref'];
        $param['amount'] = $_SESSION['amount_to_pay'];


        $mac_key = "E518D6CFEE2A2F4B8665122032FAE1F6CBC6964155CC57B204B4E1E5E911857C1F1BEE738A34D72F178A7187316329DAE6F06F5AB791E887818929A2234477CD";
        $raw_value = $param['productid'] . $param['transactionreference'] . $mac_key;
        $hash_value = hash('sha512', $raw_value);

        $url = "https://webpay.interswitchng.com/paydirect/api/v1/gettransaction.xml?productid=" . $param['productid'] . "&transactionreference=" . $param['transactionreference']
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
        if ((string) $xml->ResponseCode == '00') {

            $sql = "UPDATE travel_bookings SET status='success' WHERE transaction_ref='" . $_SESSION['trans_ref'] . "'";
            mysql_query($sql);

            include '../../util/email_handler.php';
            include '../..//util/success_email_handler.php';
            include '../..//util/travel_sms_handler.php';
            echo "<div class='trans_success' style='color:green' >"
            . "<h4> Status: " . (string) $xml->ResponseDescription . "</h4>"
            . "<h4> Response Code: " . (string) $xml->ResponseCode . "</h4>"
            . "<h4> Amount: " . (string) $xml->Amount . "</h4>"
            . "<h4> Merchant Reference: " . (string) $xml->MerchantReference . "</h4>"
            . "<h4> Payment Reference: " . (string) $xml->PaymentReference . "</h4>"
            . "<h4> Retrieval Reference Number: " . (string) $xml->RetrievalReferenceNumber . "</h4>"
            . "</div>";
            include './travel_ticket.php';
//            echo '<a onClick="javascript:window.print(); return false;"><h4>print ticket</h4></a>';
        } else {
            include '../..//util/failure_email_handler.php';
            include '../../util/email_handler.php';
            echo "<div class='trans_failure' style='color:red'>"
            . "<h4> Status: " . (string) $xml->ResponseDescription . "</h4>"
            . "<h4> Response Code: " . (string) $xml->ResponseCode . "</h4>"
            . "<h4> Amount: " . (string) $xml->Amount . "</h4>"
            . "<h4> Merchant Reference: " . (string) $xml->MerchantReference . "</h4>"
            . "<h4> Payment Reference: " . (string) $xml->PaymentReference . "</h4>"
            . "<h4> Retrieval Reference Number: " . (string) $xml->RetrievalReferenceNumber . "</h4>"
            . "</div>";
        }
        ?>
        
        <a href="/index.php"><h4>return to home page</h4></a>
    </body>
</html>