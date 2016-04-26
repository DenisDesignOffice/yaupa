<div id="taxi_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
//            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Taxi Services</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Taxi Services</h5>';
                } else {
                    echo '<h5>Edit Taxi Services</h5>';
                }
            }

            if ($view == 'addnew') {

                $service_provider = strtolower(htmlspecialchars($_GET{'service_provider'}));
                $vehicle_type = strtolower(htmlspecialchars($_GET{'vehicle_type'}));
                $coverage_state = strtolower(htmlspecialchars($_GET{'coverage_state'}));
                $coverage_area = strtolower(htmlspecialchars($_GET{'coverage_area'}));
                $amount_per_hour = strtolower(htmlspecialchars($_GET{'amount_per_hour'}));
                $amount_half_day = strtolower(htmlspecialchars($_GET{'amount_half_day'}));
                $amount_full_day = strtolower(htmlspecialchars($_GET{'amount_full_day'}));
                $vehicle_picture = strtolower(htmlspecialchars($_GET{'vehicle_picture'}));
                $location = strtolower(htmlspecialchars($_GET{'location'}));
                $coverage_distance = strtolower(htmlspecialchars($_GET{'coverage_distance'}));

                $sql = "INSERT INTO taxi_services(service_provider, vehicle_type, coverage_state, coverage_area, "
                        . "amount_per_hour, amount_half_day, amount_full_day, vehicle_picture, location, coverage_distance) "
                        . "VALUES ('$service_provider','$vehicle_type', '$coverage_state', '$coverage_area', "
                        . "'$amount_per_hour', '$amount_half_day', '$amount_full_day', '$vehicle_picture', '$location', '$coverage_distance')";

                $query = mysql_query($sql);

                if (!$query) {
                    die("connection failed" . mysql_error());
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_taxi&purpose=add&message=failure");
                } else {
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_taxi&purpose=add&message=success");
                }
            }
            ?>

        </div>



        <form style="margin-bottom: 10px;" name="
              editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <select  name="service_provider" style="width:20%; height: 30px" class="input-state" >
                        <option>--select service provider--</option>
                        <?php
                        $query = 'SELECT * FROM terminals ORDER BY tag';
                        $view = strtolower(htmlspecialchars($_GET{'purpose'}));
                        $retval = mysql_query($query);


                        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                            echo '<option>' . $row['tag'] . '</option>';
                        }
                        ?>
                    </select>
                <input name="vehicle_type"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Vehicle Type">

                <input name="coverage_state"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage State">
                <br/>
                <input name="coverage_area"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage Area">

                <input name="amount_per_hour"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount per hour">

                <input name="amount_half_day"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount half day">
                <br/>
                <input name="amount_full_day"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount full day">
                <input name="processing_fee"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Processing fee">
                <input name="location"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Location">
                <br/>
                <input name="coverage_distance"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage distance">
                <input name="vehicle_picture"   style="width:20%; margin-top: 30px; height: 30px" type="file"  classname="search"  Placeholder="Vehicle Picture">
                <br/>

                <input value="Add" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="addplus_taxi"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

            </i>


        </form>
        
        <?php
    if (isset($_GET{'message'})) {
        $message = strtolower(htmlspecialchars($_GET{'message'}));

        if ($message == 'success') {
            echo '<h5>Added successfully</h5>';
        }

        if ($message == 'failure') {
            echo '<h5>Failed</h5>';
        }
    }
    ?>

    </div>

    

</div>