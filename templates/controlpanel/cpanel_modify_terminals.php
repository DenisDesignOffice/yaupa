<div id="taxi_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
            //            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Terminal</h5>';
                }else {
                    echo '<h5>Edit Terminals</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM terminals where id=' . $id ;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            
                <input name="company" value="' . $row["company"] . '"   classname="search"  Placeholder="Company">
               
                
                <input name="phone" value="' . $row["phone"] . '"   classname="search"  Placeholder="Phone">
              
                <input name="address" value="' . $row["address"] . '"   classname="search"  Placeholder="Address">
                 </p>
                <input name="email" value="' . $row["email"] . '"  type="text"  classname="search"  Placeholder="Email">
               
                <input name="town" value="' . $row["town"] . '"   type="text"  classname="search"  Placeholder="Town">
                
                <input name="state" value="' . $row["state"] . '" type="text"  classname="search"  Placeholder="State">
                </p>
                
                <input value="Update" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="view"  value="add_terminals"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

            </i>
            
        </form>';
            }
        } else if ($view == 'delete') {
            
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM terminals where id='" . $id . "'";
            
                if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
                }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=terminals");
        } else if ($view == 'update') {
            $company =  strtolower(htmlspecialchars($_GET{'company'}));
            $address =  strtolower(htmlspecialchars($_GET{'address'}));
            $phone =  strtolower(htmlspecialchars($_GET{'phone'}));
            $email =  strtolower(htmlspecialchars($_GET{'email'}));
            $town =  strtolower(htmlspecialchars($_GET{'town'}));
            $state =  strtolower(htmlspecialchars($_GET{'state'}));
            $id =  strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE terminals SET company='$company',  address='$address', "
                    . "phone='$phone', email='$email', town='$town', state='$state'"
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=terminals");
            }
        }else {
            
            if (isset($_GET{'message'})) {
                $message = strtolower(htmlspecialchars($_GET{'message'}));

                if ($message == 'success') {
                    echo '<h5>Added successfully</h5>';
                }

                if ($message == 'failure') {
                    echo '<h5>Failed</h5>';
                }
            }
        }
        ?>







    </div>

</div>