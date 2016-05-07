<div id="charter_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <?php
            /*
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */
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
            

            if ($view == 'addnew') {

                $service_provider = strtolower(htmlspecialchars($_GET{'service_provider'}));
                $vehicle_type = strtolower(htmlspecialchars($_GET{'vehicle_type'}));
                $from_state = strtolower(htmlspecialchars($_GET{'from_state'}));
                $to_state = strtolower(htmlspecialchars($_GET{'to_state'}));
                $from_town = strtolower(htmlspecialchars($_GET{'from_town'}));
                $to_town = strtolower(htmlspecialchars($_GET{'to_town'}));
                $to_cost = strtolower(htmlspecialchars($_GET{'to_cost'}));
                $to_and_fro_cost = strtolower(htmlspecialchars($_GET{'to_and_fro_cost'}));
                $processing_fee = strtolower(htmlspecialchars($_GET{'processing_fee'}));
                $duration = strtolower(htmlspecialchars($_GET{'duration'}));

                $sql = "INSERT INTO charter_services(service_provider, vehicle_type, from_state, to_state, "
                        . "to_town, from_town, to_cost, to_and_fro_cost, processing_fee, duration) "
                        . "VALUES ('$service_provider','$vehicle_type', '$from_state', '$to_state', "
                        . "'$to_town', '$from_town', '$to_cost', '$to_and_fro_cost', '$processing_fee', '$duration')";

                $query = mysql_query($sql);

                if (!$query) {
                    die("connection failed" . mysql_error());
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_charter&purpose=add&message=failure");
                } else {
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_charter&purpose=add&message=success");
                }
            }
            ?>

            <form name="addTcForm" method="get" action="./cpanel_dashboard.php"  >
                
                    <select  name="service_provider"  class="input-state" >
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
                    <select  name="vehicle_type" s class="input-state" >
                        <option>--Select Vehicle Type--</option>
                        <?php
                        include_once '../../util/constants/vehicles.html';
                        
                        ?>
                    </select>
                    
                    <select  name="from_state"  class="input-state" >
                        <option>--Select From State--</option>
                        <?php
                        include '../../util/constants/states.html';
                        
                        ?>
                    </select>
                    </p>
                     <select   class="input-state" >
                        <option>--Select To State--</option>
                        <?php
                        include '../../util/constants/states.html';
                        
                        ?>
                    </select>
                    <input name="from_town"  type="text"  classname="search"  Placeholder="From Town">

                    <input name="to_town"   type="text"  classname="search"  Placeholder="To Town">
                    </p>
                    <input name="to_cost"    type="text"  classname="search"  Placeholder="To Cost">


                    <input name="to_and_fro_cost"    type="text"  classname="search"  Placeholder="To and Fro cost">

                    <input name="processing_fee"    type="text"  classname="search"  Placeholder="Processing fee">
                    </p>
                    <input name="duration"    type="text"  classname="search"  Placeholder="Duration">
                    <br/>

                    <input value="Add" class="submit" type="submit" classname="search"  Placeholder="Search">

                    <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                    <input name="view"  value="addplus_charter"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

                </i>


            </form>
            </div>
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

