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
            $query = "DELETE FROM charter_bookings where id='" . $id . "'";

            if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
            }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=charter_bookings");
        } else {

            $id = strtolower(htmlspecialchars($_GET{'id'}));

            $query = 'SELECT * FROM charter_bookings where id=' . $id;
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                $param = array();
                $param['productid'] = 6205;
                $param['transactionreference'] = $row['transaction_ref'];
                $param['amount'] = $row['amount_paid'] . "00";


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

                if ((string) $xml->ResponseCode == '00') {
                    $status = 'success';
                } else {
                    $status = 'pending';
                }

                $action = "UPDATE charter_bookings SET status='$status' "
                        . "WHERE id=$id";


                $query = mysql_query($action);

                if (!$query) {
                    die("connection failed" . mysql_error());
                } else {
                    echo "Edited Successfully";
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=charter_bookings");
                }
            }
        }
        ?>







    </div>

</div>