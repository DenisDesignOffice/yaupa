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
                    echo '<h5>Delete City</h5>';
                } else if ($view == 'add') {
                    echo '<h5>Add City</h5>';
                } else {
                    echo '<h5>Edit City</h5>';
                }
            }
            

            if ($view == 'addnew') {

                $destination = strtolower(htmlspecialchars($_GET{'destination'}));
                $town1 = strtolower(htmlspecialchars($_GET{'town1'}));
                $town2 = strtolower(htmlspecialchars($_GET{'town2'}));
                $town3 = strtolower(htmlspecialchars($_GET{'town3'}));
                $town4 = strtolower(htmlspecialchars($_GET{'town4'}));
                $town5 = strtolower(htmlspecialchars($_GET{'town5'}));
                $town6 = strtolower(htmlspecialchars($_GET{'town6'}));
                $town7 = strtolower(htmlspecialchars($_GET{'town7'}));
                $town8 = strtolower(htmlspecialchars($_GET{'town8'}));
                $town9 = strtolower(htmlspecialchars($_GET{'town9'}));
                $town10 = strtolower(htmlspecialchars($_GET{'town10'}));
                

                $sql = "INSERT INTO nearby_towns(destination, nearby_town1, nearby_town2, nearby_town3, "
                        . "nearby_town4, nearby_town5, nearby_town6, nearby_town7, nearby_town8, nearby_town9, nearby_town10) "
                        . " VALUES ('$destination','$town1', '$town2', '$town3', '$town4', '$town5', '$town6', '$town7', '$town8', '$town9', '$town10' )";

                $query = mysql_query($sql);

                if (!$query) {
                    die("connection failed" . mysql_error());
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_city&purpose=add&message=failure");
                } else {
                    header("location: /templates/controlpanel/cpanel_dashboard.php?view=addplus_city&purpose=add&message=success");
                }
            }
            ?>

            <form name="addTcForm" method="get" action="./cpanel_dashboard.php"  >
                
                    
                    <select  name="destination"  class="input-state" >
                        <option>--Select From State--</option>
                        <?php
                        include '../../util/constants/states.html';
                        
                        ?>
                    </select>

                    <input name="town1"   type="text"  classname="search"  Placeholder="Town 1" >
                    </p>
                    <input name="town2"    type="text"  classname="search"  Placeholder="Town 2" >

                    <input name="town3"    type="text"  classname="search"  Placeholder="Town 3" >
                    
                    <input name="town4"    type="text"  classname="search"  Placeholder="Town 4" >
                    
                    <input name="town5"    type="text"  classname="search"  Placeholder="Town 5" >
                                        </p>

                    <input name="town6"    type="text"  classname="search"  Placeholder="Town 6" >
                    
                    <input name="town7"    type="text"  classname="search"  Placeholder="Town 7" >
                    
                    <input name="town8"    type="text"  classname="search"  Placeholder="Town 8" >
                    
                    <input name="town9"    type="text"  classname="search"  Placeholder="Town 9" >
                    
                    <input name="town10"    type="text"  classname="search"  Placeholder="Town 10" >

                    </p>
                    <br/>

                    <input value="Add" class="submit" type="submit" classname="search"  Placeholder="Search">

                    <input name="purpose"  value="addnew"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">
                    <input name="view"  value="addplus_city"  style="width:20%; visibility:hidden; margin-top: 30px; height: 30px" type="text"  classname="search"  Placeholder="Tag e.g GAM for Agofure Motors">

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

