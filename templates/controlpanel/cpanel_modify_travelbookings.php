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
        }else {
            
            $id =  strtolower(htmlspecialchars($_GET{'id'}));
            
            $query = 'SELECT id,status FROM travel_bookings where id="' . $id . '"';
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                $old_status = $row['status'];
            }
            
            if ($old_status == 'success'){
                $status = 'pending'  ;
            }else if ($old_status == 'pending'){
                $status = 'success'  ;
            }else{
                $status =  'pending';
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
            
        
        ?>







    </div>

</div>