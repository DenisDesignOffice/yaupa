<div id="charter_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
//            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Charter Services</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Charter Services</h5>';
                } else {
                    echo '<h5>Edit Charter Services</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'delete') {

            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM travel_bookings where id='" . $id . "'";

            if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
            }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=travel_bookings");
        } else {

            $id = strtolower(htmlspecialchars($_GET{'id'}));

            $query = 'SELECT * FROM travel_bookings where id="' . $id . '"';
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                $param = array();
                $param['productid'] = 6410;
                $param['transactionreference'] = $row['transaction_ref'];
                $param['amount'] = $row['amount_paid'] . "00";


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

                if ((string) $xml->ResponseCode == '00') {
                    $status = 'success';
                } else {
                    $status = 'pending';
                }

                $action = "UPDATE travel_bookings SET status='$status' "
                        . "WHERE id=$id";


                $query = mysql_query($action);

                if (!$query) {
                    die("connection failed" . mysql_error());
                } else {
                    echo "Edited Successfully";
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=travel_bookings");
                }
            }
        }
        
        ?>

    </div>

</div>