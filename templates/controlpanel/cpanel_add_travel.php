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

            if ($view == 'addnew') {

                $service_provider = strtolower(htmlspecialchars($_GET{'service_provider'}));
                $vehicle_type = strtolower(htmlspecialchars($_GET{'vehicle_type'}));
                $from_state = strtolower(htmlspecialchars($_GET{'from_state'}));
                $to_state = strtolower(htmlspecialchars($_GET{'to_state'}));
                $departure_time = strtolower(htmlspecialchars($_GET{'departure_time'}));
                $speed_limit = strtolower(htmlspecialchars($_GET{'speed_limit'}));
                $last_bus_stop = strtolower(htmlspecialchars($_GET{'last_bus_stop'}));
                $cost = strtolower(htmlspecialchars($_GET{'cost'}));
                $processing_fee = strtolower(htmlspecialchars($_GET{'processing_fee'}));
                $duration = strtolower(htmlspecialchars($_GET{'duration'}));
                $id = strtolower(htmlspecialchars($_GET{'id'}));
                $stoppage_point = strtolower(htmlspecialchars($_GET{'stoppage_point'}));
                $aircondition = strtolower(htmlspecialchars($_GET{'aircondition'}));
                $luggage_limit = strtolower(htmlspecialchars($_GET{'luggage_limit '}));
                $person_per_seat = strtolower(htmlspecialchars($_GET{'person_per_seat '}));

                $sql = "INSERT INTO travel_services(service_provider, vehicle_type, from_state, to_state, "
                        . "departure_time, speed_limit, cost, last_bus_stop, processing_fee, duration, stoppage_point, aircondition, luggage_limit, person_per_seat) "
                        . "VALUES ('$service_provider','$vehicle_type', '$from_state', '$to_state', "
                        . "'$departure_time', '$speed_limit', '$cost', '$last_bus_stop', '$processing_fee', '$duration', '$stoppage_point', '$aircondition', '$luggage_limit', '$person_per_seat' )";

                $query = mysql_query($sql);

                    if (!$query) {
                        die("connection failed" . mysql_error());
                        header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_travel&purpose=add&message=failure");
                    } else {
                        header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_travel&purpose=add&message=success");
                    }
            }
            ?>
  </div>

            <form name="editTsForm" id="editTsForm" method="get" action="./cpanel_dashboard.php"  >
                
                    <select  name="service_provider"   placeholder="dfad" class="input-state" >
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
                    
                    <input name="vehicle_type"   type="text"  classname="search"  Placeholder="Vehicle Type">

                    <input name="from_state"   type="text"  classname="search"  Placeholder="From State"></p>
                   
                    <input name="to_state"   type="text"  classname="search"  Placeholder="To State">
                    <input name="cost"    type="text"  classname="search"  Placeholder="Cost">
                    <input name="stoppage_point"    type="text"  classname="search"  Placeholder="Stoppage point">
                    </p>
                    <input name="speed_limit"   type="text"  classname="search"  Placeholder="speed limit">
                    <input name="duration"    type="text"  classname="search"  Placeholder="Duration">
                    <input name="last_bus_top"    type="text"  classname="search"  Placeholder="Last bus stop">
                    </p>
                    <input name="departure_time"    type="text"  classname="search"  Placeholder="Departure time">
                    <input name="processing_fee"  type="text"  classname="search"  Placeholder="Processing fee">
                    <input name="aircondition"   type="text"  classname="search"  Placeholder="aircondition"> 
                    </p>
                    <input name="luggage_limit"    type="text"  classname="search"  Placeholder="luggage_limit">
                    <input name="person_per_seat"   type="text"  classname="search"  Placeholder="person_per_seat">
                    <p/>

                    <input value="Add" class="submit" type="submit" classname="search"  >
                    <br/>
                    <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                    <input name="view"  value="addplus_travel"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

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