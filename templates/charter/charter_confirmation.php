<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

If(!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['phone'])){
    header("location: /index.php");
}

$firstname = strtolower(htmlspecialchars($_POST['firstname']));
$lastname = strtolower(htmlspecialchars($_POST['lastname']));
$phone = strtolower(htmlspecialchars($_POST['phone']));
$email = strtolower(htmlspecialchars($_POST['email']));
$address = strtolower(htmlspecialchars($_POST['address']));
$date = strtolower(htmlspecialchars($_POST['date']));
$payment_option = strtolower(htmlspecialchars($_POST['payment_option']));
$charter_option = strtolower(htmlspecialchars($_POST['charter_option']));
$selected_option_id = strtolower(htmlspecialchars($_POST['selected_option_id']));
$sms_reminder = strtolower(htmlspecialchars($_POST['sms_reminder']));

$_SESSION['firstname'] = $firstname;
$_SESSION['sms_reminder'] = $sms_reminder;
$_SESSION['lastname'] = $lasttname;
$_SESSION['phone'] = $phone;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['date'] = $date;
$_SESSION['payment_option'] = $payment_option;
$_SESSION['charter_option'] = $charter_option;
$_SESSION['selected_option_id'] = $selected_option_id;

if ($charter_option == 'to alone') {
    $price = (int) $_SESSION['to_cost'] + (int) $_SESSION['processing_fee'];
    $_SESSION['amount_to_pay'] = $price . '00';
    $_SESSION['amount_to_pay2'] = $price . '';
} else {
    $price = (int) $_SESSION['to_and_fro_cost'] + (int) $_SESSION['processing_fee'];
    $_SESSION['amount_to_pay'] = $price . '00';
    $_SESSION['amount_to_pay2'] = $price . '';
}

if ($payment_option == 'bank_deposit') {
    header("location: ./charter_bank_deposit.php");
}
?>

<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Confirm Payment</title>

    <link rel="stylesheet" type="text/css" href="../../static/css/travel_confirm.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../static/css/switchery.min.css">

    <script src="../../static/js/modernizr.custom.js"></script>


</head>

<body>

    <?php require_once "../../templates/header.php"; ?>


<!--    <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
    </section>-->




    <section class="confirm">

        <h1>Review your order</h1>
        <div>
            <h3>Copy or print your Ref Number, then click on proceed to payment</h3>
        </div>

        <div>

            <form name="form1" method="post" action="./charter_process.php"/>
            <table>
                <tr>
                    <td class="name">Name</td>
                    <td class="value"><?php echo $firstname . " " . $lastname; ?></td>
                </tr>
                <tr>
                    <td class="name">Ref Number</td>
                    <td class="value"><?php $_SESSION['transaction_ref'] = uniqid();
                                        echo $_SESSION['transaction_ref'];
                                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="name">Amount N</td>
                    <td class="value"> <?php echo $price; ?></td>
                </tr>

            </table>

            <input type="submit" value="Proceed to Payment" class="submit">
            </form>
        </div>

    </section>

    <p>


<?php require_once "../../templates/footer.php"; ?>

</body>

<script src="../../static/js/jquery.simplemodal.js"></script>

<script type="text/javascript" src="../../static/js/switchery.min.js"></script>
<script src="../../static/js/jquery-2.1.3.js"></script>
<script src="../../static/js/waypoints.min.js"></script>
<script>
    var $head = $('#ha-header');
    $('.ha-waypoint').each(function (i) {
        var $el = $(this),
                animClassDown = $el.data('animateDown'),
                animClassUp = $el.data('animateUp');

        $el.waypoint(function (direction) {
            if (direction === 'down' && animClassDown) {
                $head.attr('class', 'ha-header ' + animClassDown);
            }
            else if (direction === 'up' && animClassUp) {
                $head.attr('class', 'ha-header ' + animClassUp);
            }
        }, {offset: '100%'});
    });
</script>

<!--<section>
        <h1>Confirm Payment</h1>

        <form name="form1" method="post" action="./charter_process.php">
            <div class="col-2">
                <label>COMPANY:
                    <h6 style="size: 20px"><?php echo $_SESSION['company_name']; ?></h4>
                </label>
                <label>Price:
                    <h6 style="size: 20px"><?php echo $_SESSION['amount_to_pay2']; ?></h4>
                </label>
                <label>
                    TICKET QUANTITY
                    <select tabindex="7" id="payment_option" name="payment_option" />
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    </select>
                </label>
                <label><input type="submit" value="PROCEED"/></label>
            </div>
            
        </form>

    </section>-->

</html>