<div id="charter_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
//            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete City</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add City</h5>';
                } else {
                    echo '<h5>Edit City</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM nearby_towns where id=' . $id ;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editCsForm" id="editCsForm" method="get" action="./cpanel_dashboard.php"  >
            
                <input name="destination" value="' . $row["destination"] . '"  type="text"  classname="search"  Placeholder="Service Provider" readonly>
               
                <input name="town1" value="' . $row["nearby_town1"] . '"  type="text"  classname="search"  Placeholder="town 1">
                
                </p>
                <input name="town2" value="' . $row["nearby_town2"] . '"  type="text"  classname="search"  Placeholder="town 2">
                
                <input name="town3" value="' . $row["nearby_town3"] . '"   type="text"  classname="search"  Placeholder="town 3">
                
                </p>
                
                <input value="Update" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="view"  value="add_city"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

</i>

            
        </form>';
            }
        } else if ($view == 'delete') {
            
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM nearby_town where id='" . $id . "'";
            
                if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
                }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=cities");
        } else if ($view == 'update') {
            $destination = strtolower(htmlspecialchars($_GET{'destination'}));
                $town1 = strtolower(htmlspecialchars($_GET{'town1'}));
                $town2 = strtolower(htmlspecialchars($_GET{'town2'}));
                $town3 = strtolower(htmlspecialchars($_GET{'town3'}));
            $id =  strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE nearby_towns SET nearby_town1='$town1', nearby_town2='$town2', nearby_town3='$town3' "
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=cities");
            }
        } 


?>

</div>