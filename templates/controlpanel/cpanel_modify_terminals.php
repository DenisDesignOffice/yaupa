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
                } else if ($view == 'add') {
                    echo '<h5>Add Terminals</h5>';
                } else {
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
            <i class="fa fa-search">
                <input name="company" value="' . $row["company"] . '" style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Company">
               
                <input name="tag" value="' . $row["tag"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag">
                
                <input name="phone" value="' . $row["phone"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Phone">
                <br/>
                <input name="address" value="' . $row["address"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Address">
               
                <input name="email" value="' . $row["email"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Email">
               
                <input name="town" value="' . $row["town"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Town">
                <br/>
                <input name="state" value="' . $row["state"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="State">
                <br/>
                
                <input value="Update" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_terminals"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

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
            $tag =  strtolower(htmlspecialchars($_GET{'tag'}));
            $address =  strtolower(htmlspecialchars($_GET{'address'}));
            $phone =  strtolower(htmlspecialchars($_GET{'phone'}));
            $email =  strtolower(htmlspecialchars($_GET{'email'}));
            $town =  strtolower(htmlspecialchars($_GET{'town'}));
            $state =  strtolower(htmlspecialchars($_GET{'state'}));
            $id =  strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE terminals SET company='$company', tag='$tag', address='$address', "
                    . "phone='$phone', email='$email', town='$town', state='$state'"
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=terminals");
            }
        } else if ($view == 'addnew') {

            $company =  strtolower(htmlspecialchars($_GET{'company'}));
            $tag =  strtolower(htmlspecialchars($_GET{'tag'}));
            $address =  strtolower(htmlspecialchars($_GET{'address'}));
            $phone =  strtolower(htmlspecialchars($_GET{'phone'}));
            $email =  strtolower(htmlspecialchars($_GET{'email'}));
            $town =  strtolower(htmlspecialchars($_GET{'town'}));
            $state =  strtolower(htmlspecialchars($_GET{'state'}));

            $sql = "INSERT INTO terminals(company, tag, address, phone, "
                    . "email, town, state) "
                    . "VALUES ('$company','$tag', '$address', '$phone', "
                    . "'$email', '$town', '$state')";

            $query = mysql_query($sql);

            if (!$query) {
                die("connection failed" . mysql_error());
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_terminals&purpose=add&message=failure");
            } else {
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_terminals&purpose=add&message=success");
            }
        } else {
            echo '<form style="margin-bottom: 10px;" name="
                    editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <input name="company" style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Company">
               
                <input name="tag" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag">
                
                <input name="phone"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Phone">
                <br/>
                <input name="address"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Address">
               
                <input name="email"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Email">
               
                <input name="town"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Town">
                <br/>
                <input name="state"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="State">
                <br/>
                
                <input value="Add" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_terminals"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

</i>

            
        </form>';
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