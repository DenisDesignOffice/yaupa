<div id="taxi_servicesdSDiv" style="display: block" class="modal">

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
                    echo '<h5>Delete Terminal</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add Terminals</h5>';
                } 
            }


            $view = strtolower(htmlspecialchars($_GET{'purpose'}));
            $retval = mysql_query($query);

            if ($view == 'addnew') {

                $company = strtolower(htmlspecialchars($_GET{'company'}));
                
                $address = strtolower(htmlspecialchars($_GET{'address'}));
                $phone = strtolower(htmlspecialchars($_GET{'phone'}));
                $email = strtolower(htmlspecialchars($_GET{'email'}));
                $town = strtolower(htmlspecialchars($_GET{'town'}));
                $state = strtolower(htmlspecialchars($_GET{'state'}));

                $query = "SELECT * FROM transport_companies where name='$company'" ;
                $retval = mysql_query($query);
                
                $tagg = 'yp';
                while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                    $tagg = $row['tag'];
                }

                $tag = strtolower($tagg . mt_rand(11111, 99999) . htmlspecialchars($_GET{'tag'}));
                
                $sql = "INSERT INTO terminals(company, tag, address, phone, "
                        . "email, town, state, password) "
                        . "VALUES ('$company','$tag', '$address', '$phone', "
                        . "'$email', '$town', '$state', '$tag')";

                $query = mysql_query($sql);

                if (!$query) {
                    die("connection failed" . mysql_error());
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_terminals&purpose=add&message=failure");
                } else {
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_terminals&purpose=add&message=success");
                }
            }
            ?>
            <form style="margin-bottom: 10px;" name="
                  editTxsForm" id="editTxsForm" method="get" action="./cpanel_dashboard.php"  >
                <i class="fa fa-search">

                    <select  name="company" style="width:20%; height: 30px" class="input-state" >
                        <option>--transport company--</option>
                        <?php
                        $query = 'SELECT * FROM transport_companies order by name';
                        $view = strtolower(htmlspecialchars($_GET{'purpose'}));
                        $retval = mysql_query($query);


                        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                            echo '<option>' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>

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
                    <input name="view"  value="addplus_terminals"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure motors">

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






