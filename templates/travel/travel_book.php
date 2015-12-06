<?php session_start(); ?>

<?php
$_SESSION['stoppage'] = strtolower(htmlspecialchars($_POST['stoppage']));
$_SESSION['address'] = strtolower(htmlspecialchars($_POST['address']));
$_SESSION['type'] = strtolower(htmlspecialchars($_POST['type']));
$_SESSION['processing_fee'] = strtolower(htmlspecialchars($_POST['processing_fee']));
$_SESSION['aircondition'] = strtolower(htmlspecialchars($_POST['aircondition']));
$_SESSION['departure'] = strtolower(htmlspecialchars($_POST['departure']));
$_SESSION['cost'] = strtolower(htmlspecialchars($_POST['cost']));

?>

<!DOCTYPE html> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Booking Form</title>


    <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/book.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../static/css/switchery.min.css">
    <script type="text/javascript" src="../../static/js/switchery.min.js"></script>


    <script src="../../static/js/modernizr.custom.js"></script>


</head>

<body>

    <?php require_once "../../templates/header.php"; ?>


    <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
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
    </section>

    <section>
        <h1>Travel Booking Form</h1>

        <form method="post" id="travel_book" action="./travel_confirmation.php">
            <div class="col-2">
                <label>Firstname
                    <input placeholder="Enter your  complete names" id="firstname" name="firstname" tabindex="1" />
                </label>
            </div>
            <div class="col-2">
                <label>Lastname
                    <input placeholder="Enter your surname" id="lastname" name="lastname" tabindex="2"  />
                </label>
            </div>
            <div class="col-2">
                <label>
                    Phone Number
                    <input placeholder="What's the best way to call your" id="phone" name="phone" tabindex="3" />
                </label>
            </div>
            <div class="col-3">
                <label>
                    Email
                    <input placeholder="Enter email address. e.g travlin@yahoo.com" id="email" name="email" tabindex="4" />
                </label>
            </div>
            <div class="col-3">
                <label>
                    Address
                    <input placeholder="Residential address" id="address" name="address" tabindex="5" />
                </label>
            </div>

            <div class="col-4">
                <label>
                    Yaupag Date
                    <input placeholder="dd-mm-yy" id="date" name="date" tabindex="6"  />
                </label>
            </div>

            <div class="col-4">
                <label>
                    Payment Option
                    <select tabindex="7" id="payment_option" name="payment_option" />
                    <option> - </option>
                    <option>Bank_Deposit</option>
                    <option>Debit Card</option>
                    <option>Other</option>
                    </select>
                </label>
            </div>

            <div class="col-4">
                <label>
                    sms reminder
                    <center style="position:relative; margin-bottom:0;">
                        <input type="checkbox" name="sms_reminder" id="sms_reminder" class="js-switch" tabindex="8">
                    </center>
                </label>
            </div>

            <div class="col-4">
                <label>
                    How do You want to Charter?
                    <select tabindex="7" id="charter_option" name="charter_option" >
                        <option> - </option>
                        <option>To and Fro</option>
                        <option>To alone</option>

                    </select>
                </label>
            </div>



            <input type="hidden"  name="selected_option_id"  value="<?php echo $value; ?>" /> 

            <div class="col-submit">
                <input type="submit" id="submitbt" class="submit" value="Proceed to Payment"/>
            </div>
        </form>


        <script type="text/javascript">
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function (html) {
                var switchery = new Switchery(html);
            });
        </script>

    </section>

    <script src="../../static/js/jquery.simplemodal.js"></script>
    <script src="../../static/js/jquery.js"></script>
    <?php require_once "../../templates/footer.php";
    ?>

