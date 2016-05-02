<div id="transport_companiesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <?php
            if (isset($_GET{'purpose'})) {
                $view = strtolower(htmlspecialchars($_GET{'purpose'}));

                if ($view == 'delete') {
                    echo '<h5>Delete Transport Company</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Transport Company</h5>';
                } else {
                    echo '<h5>Edit Transport Company</h5>';
                }
            }
            ?>

        </div>

        <?php
        if ($view == 'edit') {
            $tag = strtolower(htmlspecialchars($_GET{'tag'}));
            $query = 'SELECT * FROM transport_companies where tag="' . $tag . '"';
            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                echo '<form style="margin-bottom: 10px;" name="
                    editTcForm" id="editTcForm" method="get" action="./cpanel_dashboard.php"  >
            
                <input name="name" value="' . $row["name"] . '"   classname="search"  Placeholder="Company name">
                <br/>
                <input name="tag" value="' . $row["tag"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <br/>
                <input name="email" value="' . $row["email"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Email">
                <br/>
                <input name="phone" value="' . $row["phone"] . '" style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Phone">
                <br/>
                <input name="head_office" value="' . $row["head_office"] . '"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Head office">
                <br/>
                <input name="logo"  style="width:20%; margin-top: 30px; height: 30px" type="file"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                </p>
                <input value="Update" class="submit" type="submit" classname="search"  Placeholder="Update">
                <br/>
                <input name="purpose"  value="update"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="id"  value="' . $row["id"] . '"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_company"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

</i>

            
        </form>';
            }
        } else if ($view == 'delete') {
            $tag = strtolower(htmlspecialchars($_GET{'tag'}));
            $query = "DELETE FROM transport_companies where tag='" . $tag . "'";

            mysql_query($query, $connect);

            header("location: /templates/controlpanel/cpanel_dashboard.php?view=transport_companies");
        } else if ($view == 'update') {
//            echo "Edited Successfully";
            $id = strtolower(htmlspecialchars($_GET{'id'}));
            $name = strtolower(htmlspecialchars($_GET{'name'}));
            $tag = strtolower(htmlspecialchars($_GET{'tag'}));
            $email = strtolower(htmlspecialchars($_GET{'email'}));
            $phone = strtolower(htmlspecialchars($_GET{'phone'}));
            $head_office = strtolower(htmlspecialchars($_GET{'head_office'}));
            $logo = strtolower(htmlspecialchars($_GET{'logo'}));

            $action = "UPDATE transport_companies SET name='$name', tag='$tag', email='$email', phone='$phone', logo='$logo', head_office='$head_office' "
                    . "WHERE id=$id";


            $query = mysql_query($action);

            if (!$query) {
                die("connection failed" . mysql_error());
            } else {
                echo "Edited Successfully";
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=transport_companies");
            }
        } else if ($view == 'addnew') {

            $name = strtolower(htmlspecialchars($_GET{'name'}));
            $tag = strtolower(htmlspecialchars($_GET{'tag'}));
            $email = strtolower(htmlspecialchars($_GET{'email'}));
            $phone = strtolower(htmlspecialchars($_GET{'phone'}));
            $head_office = strtolower(htmlspecialchars($_GET{'head_office'}));
            $logo = strtolower(htmlspecialchars($_GET{'logo'}));

            $sql = "INSERT INTO transport_companies(name, tag, email, phone, head_office, logo) "
                    . "VALUES ('$name','$tag', '$email', '$phone', '$head_office', '$logo')";

            $query = mysql_query($sql);

            if (!$query) {
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_company&purpose=add&message=failure");
            } else {
                header("location: /templates/controlpanel/cpanel_dashboard.php?view=add_company&purpose=add&message=success");
            }
        } else {
            echo '<form style="margin-bottom: 10px;" name="addTcForm" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <input name="name"  style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Company name">
                <br/>
                <input name="tag"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <br/>
                <input name="email"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Email">
                <br/>
                <input name="phone"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Phone">
                <br/>
                <input name="head_office"  style="width:20%; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Head office">
                <br/>
                <input name="logo"  style="width:20%; margin-top: 30px; height: 30px" type="file"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <br/>
                <input value="Add" style="width:20%; margin-top: 30px; height: 30px; margin-top: 2dp " type="submit" classname="search"  Placeholder="Search">
<br/>
                <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">
                <input name="view"  value="add_company"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

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