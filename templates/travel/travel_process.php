<?php
session_start();
require_once "../../util/pin_generator.php";

If (!isset($_SESSION['company_name']) || !isset($_SESSION['address']) || !isset($_SESSION['type'])) {
    header("location: /index.php");
}

$generate_random_cust_id = mt_rand(111, 999);
$generate_random_trans_ref = $_SESSION['transaction_ref'];
$mac_key = "E518D6CFEE2A2F4B8665122032FAE1F6CBC6964155CC57B204B4E1E5E911857C1F1BEE738A34D72F178A7187316329DAE6F06F5AB791E887818929A2234477CD";
$url = "http://127.0.0.1/templates/travel/travel_order_status.php";
$product_id = 6410;
$pay_item_id = 101;

$_SESSION['trans_ref'] = $generate_random_trans_ref;
$pin = mt_rand(1111111111, 9999999999);
$_SESSION['pin'] = $pin;


require_once "../../util/connection.php";

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$traveling_date = $_SESSION['date'];
$payment_date = $_SESSION['date'];
$payment_option = $_SESSION['payment_option'];
$service_provider = $_SESSION['company_name'];
$type = $_SESSION['type'];
$processing_fee = $_SESSION['processing_fee'];
//$to_and_fro_cost = $_SESSION['to_and_fro_cost'];
//$to_cost = $_SESSION['to_cost'];
$amount = $_SESSION['amount_to_pay'];
$location_state = $_SESSION['from_state'];
$destination_state = $_SESSION['to_state'];
$next_of_kin = $_SESSION['next_of_kin'];
$to_state = $_SESSION['to_state'];
$from_state = $_SESSION['from_state'];
$tag = $_SESSION['sp_tag'];

$put = "INSERT INTO travel_bookings (firstname,lastname, email, phone, address, "
        . "payment_date, traveling_date, next_of_kin, payment_type, reg_pin, "
        . " serial, service_provider, amount_paid, status, to_state, from_state, "
        . "bank_slip_no, bank_of_payment, debit_trans_no, name_of_depositor, date_of_deposition,  source, transaction_ref ) "
        . " VALUES('$firstname', '$lastname', '$email', '$phone', '$address', '$payment_date', "
        . " '$traveling_date', '$next_of_kin',  '$payment_option', '$pin', '$generate_random_cust_id', "
        . " '$tag', '$amount', 'pending', "
        . " '$to_state', '$from_state', '', '', '', '', '', '', '$generate_random_trans_ref' )";


$results = mysql_query($put);
if (!$results) {
    die('Could not enter data: ' . mysql_error());
}


mysql_close($connect);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="/static/images/favicon.ico">
            <title>booking</title>
    </head>

    <body onload="document.travel_form.submit()">
        <h1>Please wait...Redirecting...</h1>
        <p>Click the proceed button if your browser fails to redirect</p>
        <form name="travel_form" method="post" action="https://webpay.interswitchng.com/paydirect/pay">

            <td colspan="4"><div align="center">
                    <input name="product_id" type="hidden" value="<?php echo $product_id; ?>" />
                    <input name="amount" type="hidden" value="<?php echo $_SESSION['amount_to_pay']; ?>" />
                    <input name="currency" type="hidden" value="566" />
                    <input name="payment_params" type="hidden" value="0" />
                    <input name="site_redirect_url" type="hidden" value="<?php echo $url; ?>"/>
                    <input name="site_name" type="hidden" value="www.yaupa.com"/>
                    <input name="cust_id" type="hidden" value="<?php echo $generate_random_cust_id; ?>" />
                    <input name="cust_name" type="hidden" value="<?php echo $_SESSION['lastname']; ?>" />
                    <input name="cust_name_desc" type="hidden" value="customer name" />
                    <input name="pay_item_id" type="hidden" value="<?php echo $pay_item_id; ?>" />
                    <input name="pay_item_name" type="hidden" value="payment name" />
                    <input name="txn_ref" type="hidden" value="<?php echo $generate_random_trans_ref; ?>" />
                    <?php
                    $raw_value = $generate_random_trans_ref . $product_id . $pay_item_id . $_SESSION['amount_to_pay'] . $url . $mac_key;
                    $hash_value = hash('sha512', $raw_value);
                    ?>
                    <input name="hash" type="hidden" value="<?php echo $hash_value; ?>" />
                    <input type="submit" name="button" id="button" value="Proceed" />
                </div></td>
            </tr>
            </table>
        </form>

    </body>
</html>