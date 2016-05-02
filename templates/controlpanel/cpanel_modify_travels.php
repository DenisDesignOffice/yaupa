<div id="travel_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
//            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Travel Services</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Travel Services</h5>';
                } else {
                    echo '<h5>Edit Travel Services</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM travel_services where id=' . $id ;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editTsForm" id="editTsForm" method="get" action="./cpanel_dashboard.php"  >
           
                <input name="service_provider" value="' . $row["service_provider"] . '"  type="text"  classname="search"  Placeholder="Service provider">
               
                <input name="vehicle_type" value="' . $row["vehicle_type"] . '"  type="text"  classname="search"  Placeholder="Vehicle Type">
                
                <input name="from_state" value="' . $row["from_state"] . '"  type="text"  classname="search"  Placeholder="From State">
                </p>
                <input name="to_state" value="' . $row["to_state"] . '"  type="text"  classname="search"  Placeholder="To State">
               
                <input name="cost" value="' . $row["cost"] . '"   type="text"  classname="search"  Placeholder="Cost">
               
                <input name="stoppage_point" value="' . $row["stoppage_point"] . '"   type="text"  classname="search"  Placeholder="Stoppage point">
                </p>
                <input name="speed_limit" value="' . $row["speed_limit"] . '"   type="text"  classname="search"  Placeholder="speed limit">
                <input name="duration" value="' . $row["duration"] . '"   type="text"  classname="search"  Placeholder="Duration">
                <input name="last_bus_top" value="' . $row["last_bus_stop"] . '"   type="text"  classname="search"  Placeholder="Last bus stop">
                </p>
                <input name="departure_time" value="' . $row["departure_time"] . '"   type="text"  classname="search"  Placeholder="Departure time">
                <input name="processing_fee" value="' . $row["processing_fee"] . '"   type="text"  classname="search"  Placeholder="Processing fee">
                </p>
                
                <input value="Update" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_travels"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

</i>

            
        </form>';
            }
        } else if ($view == 'delete') {
            
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM travel_services where id='" . $id . "'";
            
                if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
                }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=travel_services");
        } else if ($view == 'update') {
            $service_provider =  strtolower(htmlspecialchars($_GET{'service_provider'}));
            $vehicle_type =  strtolower(htmlspecialchars($_GET{'vehicle_type'}));
            $from_state =  strtolower(htmlspecialchars($_GET{'from_state'}));
            $to_state =  strtolower(htmlspecialchars($_GET{'to_state'}));
            $departure_time =  strtolower(htmlspecialchars($_GET{'departure_time'}));
            $speed_limit =  strtolower(htmlspecialchars($_GET{'speed_limit'}));
            $last_bus_stop =  strtolower(htmlspecialchars($_GET{'last_bus_stop'}));
            $cost =  strtolower(htmlspecialchars($_GET{'cost'}));
            $processing_fee =  strtolower(htmlspecialchars($_GET{'processing_fee'}));
            $duration =  strtolower(htmlspecialchars($_GET{'duration'}));
            $id =  strtolower(htmlspecialchars($_GET{'id'}));
            $stoppage_point =  strtolower(htmlspecialchars($_GET{'stoppage_point'}));

            $action = "UPDATE travel_services SET service_provider='$service_provider', vehicle_type='$vehicle_type', to_state='$to_state', "
                    . "from_state='$from_state', departure_time='$departure_time', speed_limit='$speed_limit', last_bus_stop='$last_bus_stop',"
                    . "cost='$cost', processing_fee='$processing_fee', duration='$duration', stoppage_point='$stoppage_point' "
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=travel_services");
            }
        } 
        ?>







    </div>

</div>