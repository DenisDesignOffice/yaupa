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
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM charter_services where id=' . $id ;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editCsForm" id="editCsForm" method="get" action="./cpanel_dashboard.php"  >
            
                <input name="service_provider" value="' . $row["service_provider"] . '"  type="text"  classname="search"  Placeholder="Service Provider">
               
                <input name="vehicle_type" value="' . $row["vehicle_type"] . '"  type="text"  classname="search"  Placeholder="Vehicle Type">
                
                <input name="from_state" value="' . $row["from_state"] . '"  type="text"  classname="search"  Placeholder="From State">
                </p>
                <input name="to_state" value="' . $row["to_state"] . '"  type="text"  classname="search"  Placeholder="To State">
                
                <input name="from_town" value="' . $row["from_town"] . '"   type="text"  classname="search"  Placeholder="From Town">
                
                <input name="to_town" value="' . $row["to_town"] . '"   type="text"  classname="search"  Placeholder="To Town">
                </p>
                <input name="to_cost" value="' . $row["to_cost"] . '"   type="text"  classname="search"  Placeholder="To Cost">
               

                <input name="to_and_fro_cost" value="' . $row["to_and_fro_cost"] . '"   type="text"  classname="search"  Placeholder="To and Fro Cost">
                
                <input name="processing_fee" value="' . $row["processing_fee"] . '"  type="text"  classname="search"  Placeholder="Processing Fee">
                </p>
                <input name="duration" value="' . $row["duration"] . '"   type="text"  classname="search"  Placeholder="Duration">
                </p>
                
                <input value="Update" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="view"  value="add_charter"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

</i>

            
        </form>';
            }
        } else if ($view == 'delete') {
            
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM charter_services where id='" . $id . "'";
            
                if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
                }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=charter_services");
        } else if ($view == 'update') {
            $service_provider =  strtolower(htmlspecialchars($_GET{'service_provider'}));
            $vehicle_type =  strtolower(htmlspecialchars($_GET{'vehicle_type'}));
            $from_state =  strtolower(htmlspecialchars($_GET{'from_state'}));
            $to_state =  strtolower(htmlspecialchars($_GET{'to_state'}));
            $from_town =  strtolower(htmlspecialchars($_GET{'from_town'}));
            $to_town =  strtolower(htmlspecialchars($_GET{'to_town'}));
            $to_cost =  strtolower(htmlspecialchars($_GET{'to_cost'}));
            $to_and_fro_cost =  strtolower(htmlspecialchars($_GET{'to_and_fro_cost'}));
            $processing_fee =  strtolower(htmlspecialchars($_GET{'processing_fee'}));
            $duration =  strtolower(htmlspecialchars($_GET{'duration'}));
            $id =  strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE charter_services SET service_provider='$service_provider', vehicle_type='$vehicle_type', to_state='$to_state', "
                    . "from_state='$from_state', from_town='$from_town', to_town='$to_town' "
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=charter_services");
            }
        } 


?>

</div>