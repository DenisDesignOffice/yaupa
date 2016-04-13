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
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM taxi_services where id=' . $id;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <input name="service_provider" value="' . $row["service_provider"] . '" style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Service provider">
               
                <input name="vehicle_type" value="' . $row["vehicle_type"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Vehicle Type">
                
                <input name="coverage_state" value="' . $row["coverage_state"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage State">
                <br/>
                <input name="coverage_area" value="' . $row["coverage_area"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage Area">
               
                <input name="amount_per_hour" value="' . $row["amount_per_hour"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount per hour">
               
                <input name="amount_half_day" value="' . $row["amount_half_day"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount half day">
                <br/>
                <input name="amount_full_day" value="' . $row["amount_full_day"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Amount full day">
                <input name="processing_fee" value="' . $row["processing_fee"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Processing fee">
                <input name="location" value="' . $row["location"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Location">
                <br/>
                <input name="coverage_distance" value="' . $row["coverage_distance"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Coverage distance">
                <input name="vehicle_picture" value="' . $row["vehicle_picture"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="file"  classname="search"  Placeholder="Vehicle Picture">
                <br/>
                
                <input value="Update" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_taxi"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

</i>

            
        </form>';
            }
        } else if ($view == 'delete') {

            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM taxi_services where id='" . $id . "'";

            if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
            }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=taxi_services");
        } else if ($view == 'update') {
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
            $id = strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE taxi_services SET service_provider='$service_provider', vehicle_type='$vehicle_type', coverage_state='$coverage_state', "
                    . "coverage_area='$coverage_area', amount_per_hour='$amount_per_hour', amount_half_day='$amount_full_day', amount_full_day='$amount_full_day',"
                    . "vehicle_picture='$vehicle_picture', location='$location', coverage_distance='$coverage_distance' "
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=taxi_services");
            }
        }
        ?>

    </div>

</div>