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



        <form  name="editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            
                <select name="service_provider"  class="input-state" >
                        <option>--Select Service Provider--</option>
                        <?php
                        $query = 'SELECT * FROM terminals ORDER BY tag';
                        $view = strtolower(htmlspecialchars($_GET{'purpose'}));
                        $retval = mysql_query($query);


                        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                            echo '<option>' . $row['tag'] . '</option>';
                        }
                        ?>
                    </select>
                <input name="vehicle_type"   type="text"  classname="search"  Placeholder="Vehicle Type">

                <!--<input name="coverage_state"   type="text"  classname="search"  Placeholder="Coverage State">-->
                <select  name="coverage_state"  class="input-state" >
                        <option>--Select From State--</option>
                        <?php
                        include '../../util/constants/states.html';
                        
                        ?>
                    </select>
                    
                </p>
                <input name="coverage_area"   type="text"  classname="search"  Placeholder="Coverage Area">

                <input name="amount_per_hour"   type="text"  classname="search"  Placeholder="Amount Per Hour">

                <input name="amount_half_day"   type="text"  classname="search"  Placeholder="Amount Half Day">
                </p>
                <input name="amount_full_day"   type="text"  classname="search"  Placeholder="Amount Full Day">
                <input name="processing_fee"   type="text"  classname="search"  Placeholder="Processing Fee">
                <input name="location"    classname="search"  Placeholder="Location">
                </p>
                <input name="coverage_distance"   type="text"  classname="search"  Placeholder="Coverage distance">
                <input name="vehicle_picture"    type="file"  classname="search"  Placeholder="Vehicle Picture">
                </p>

                <input value="Add" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="view"  value="addplus_taxi"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

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
