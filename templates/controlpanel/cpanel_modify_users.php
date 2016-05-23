<div id="taxi_servicesdSDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
//            session_start();
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Users</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Users</h5>';
                } else {
                    echo '<h5>Edit Users</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = 'SELECT * FROM users where id=' . $id;
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            
                <input name="username" value="' . $row["username"] . '"   classname="search"  Placeholder="Username">
               
                <input name="firstname" value="' . $row["firstname"] . '"  type="text"  classname="search"  Placeholder="Firstname">
                
                <input name="lastname" value="' . $row["lastname"] . '"  type="text"  classname="search"  Placeholder="Lastname">
                </p>
                <input name="access_level" value="' . $row["access_level"] . '"  type="text"  classname="search"  Placeholder="Acess level e.g 1, 2 or 3">
               
                <input name="email" value="' . $row["email"] . '"   type="text"  classname="search"  Placeholder="Email">
               
                <input name="phone" value="' . $row["phone"] . '"   type="text"  classname="search"  Placeholder="Phone">
                </p>
                <input name="status" value="' . $row["status"] . '"   type="text"  classname="search"  Placeholder="Status">
                </p>
                
                <input value="Update" class="submit" type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_users"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
            </i>
        </form>';
            }
        } else if ($view == 'delete'){

            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $query = "DELETE FROM users where id='" . $id . "'";

            if ($_POST['confirm'] !== 1) {
                mysql_query($query, $connect);
            }

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=users");
        } else if ($view == 'update') {
            $username = strtolower(htmlspecialchars($_GET{'username'}));
            $firstname = strtolower(htmlspecialchars($_GET{'firstname'}));
            $lastname = strtolower(htmlspecialchars($_GET{'lastname'}));
            $phone = strtolower(htmlspecialchars($_GET{'phone'}));
            $email = strtolower(htmlspecialchars($_GET{'email'}));
            $access_level = strtolower(htmlspecialchars($_GET{'access_level'}));
            $status = strtolower(htmlspecialchars($_GET{'status'}));
            $id = strtolower(htmlspecialchars($_GET{'id'}));

            $action = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname', "
                    . "phone='$phone', email='$email', access_level='$access_level', status='$status'"
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=users");
            }
        } else if ($view == 'addnew') {

            $username = strtolower(htmlspecialchars($_GET{'username'}));
            $firstname = strtolower(htmlspecialchars($_GET{'firstname'}));
            $lastname = strtolower(htmlspecialchars($_GET{'lastname'}));
            $phone = strtolower(htmlspecialchars($_GET{'phone'}));
            $email = strtolower(htmlspecialchars($_GET{'email'}));
            $access_level = strtolower(htmlspecialchars($_GET{'access_level'}));
            $status = strtolower(htmlspecialchars($_GET{'status'}));
            $password = $lastname.$firstname;

            $sql = "INSERT INTO users(username, firstname, lastname, phone, "
                    . "email, access_level, status, password) "
                    . "VALUES ('$username', '$firstname' , '$lastname',  '$phone', "
                    . "'$email', '$access_level', '$status', '$password')";

            $query = mysql_query($sql);

            if (!$query) {
                die("connection failed" . mysql_error());
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_users&purpose=add&message=failure");
            } else {
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_users&purpose=add&message=success");
            }
        } else {
            echo '<form style="margin-bottom: 10px;" name="
                    editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <input name="username"  style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Username">
               
                <input name="firstname"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Firstname">
                
                <input name="lastname"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Lastname">
                <br/>
                <input name="access_level"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Acess Level e.g 1, 2 or 3">
               
                <input name="email"   style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Email">
               
                <input name="phone" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Phone">
                <br/>
                <input name="status"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Status">
                <br/>
                
                <input value="Add" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  >
                <br/>
                <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                <input name="view"  value="add_users"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

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