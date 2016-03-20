<!-- The Modal -->
<div id="charter_servicesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <h5>Charter Services</h5>

        </div>
         <form style="margin-bottom: 10px;" name="myform1" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search"><input name="search"  style="width:20%; height: 30px" type="text"  classname="search"  Placeholder="Search by service provider">
            <input value="search" style="width:5%; height: 30px; margin-top: 2dp " type="submit" classname="search"  Placeholder="Search"></i>
                                <i class="fa fa-search"><input name="view" value="charter_services" style="width:20%; height: 30px; visibility: hidden" type="text" classname="search"  Placeholder="Search"></i>
                                <i class="fa fa-search"></i>
                        </form>
        <div class="modal-body">

            <div>
                <table>
                    <tr>
                        <th>Service Provider</th>
                        <th>Vehicle Type</th>
                        <th>From State</th>
                        <th>To State</th>
                        <th>From Town</th>
                        <th>To Town</th>
                        <th>Cost(To)</th>
                        <th>Cost(And fro)</th>
                        <th>Processing fee</th>
                        <th>Duration</th>
                        

                    </tr>
                    <?php
                    /* Get total number of records */
                    $sql = "";
                    if (isset($_GET{'search'})) {
                        $search = strtolower(htmlspecialchars($_GET{'search'}));
//                        $sql = "SELECT FROM transport_companies WHERE * LIKE " . '%$search%';
                        $sql = "SELECT * FROM `charter_services` WHERE service_provider LIKE '%$search%'";
                    }else{
                        $sql = "SELECT * FROM charter_services";
                    }
                    $retval = mysql_query($sql);
                    $rec_limit = 10;
                    $rec_count = mysql_num_rows($retval);


                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }
//                    $row = mysql_fetch_array($retval, MYSQL_NUM);
//                    $rec_count = $row[0];
//                    echo $rec_count;


                    if (isset($_GET{'page'})) {
                        $page = $_GET{'page'};
                        if ($page > 1) {
                            $offset = $rec_limit + $page;
                        } else {
                            $offset = 0;
                        }
                    } else {
                        $page = 1;
                        $offset = 0;
                    }

                    $left_rec = $rec_count - ($page * $rec_limit);
                    if (isset($_GET{'search'})) {
                        $sql = "SELECT * FROM charter_services WHERE service_provider LIKE '%$search%' " . "LIMIT  $rec_limit OFFSET $offset";
                    }else{
                        $sql = "SELECT * FROM charter_services " . "LIMIT  $rec_limit OFFSET 0";
                    }

                    $retval = mysql_query($sql);

                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }

                    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo "<tr>
                                                    <td>" . $row['service_provider'] . "</td>
                                                    <td>" . $row['vehicle_type'] . "</td>
                                                    <td>" . $row['from_state'] . "</td>
                                                    <td>" . $row['to_state'] . "</td>
                                                    <td>" . $row['from_town'] . "</td>
                                                    <td>" . $row['to_town'] . "</td>
                                                    <td>" . $row['to_cost'] . "</td>
                                                    <td>" . $row['to_and_fro_cost'] . "</td>
                                                    <td>" . $row['processing_fee'] . "</td>
                                                    <td>" . $row['duration'] . "</td>
                                                    <td> <span class='f-button'>edit</span> </td>
                                                    <td> <span class='f-button'>delete</span> </td> 
                                                  </tr>";
                    }
                    ?>



                </table>
            </div>
            <div>
                <ul class="pagination">
                    <?php
                    $pages = $rec_count / $rec_limit;
                    $tempMod = $rec_count % $rec_limit;
                    $prev = $page - 1;
                    $next = $page + 1;
                    
                    if($tempMod > 0){
                        $pages = $pages + 1;
                    }

                    if ($pages > 1 && $pages > 10) {
                        if($prev > 0){
                            echo '<li><a href="?view=charter_services&page=' . $prev .'"><<</a></li>';
                        }
                        
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=charter_services&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }
                        
                        if($next < $pages){
                            echo '<li><a href="?view=charter_services&page='  . $next  . '">>></a></li>';
                        }
                    }else  {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=charter_services&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }
                    }
                    
                    
                    ?>
                </ul>
            </div> 


        </div>
        <br/>

        <div class="modal-footer">
            <span class="f-button">Add New</span>

        </div>

    </div>

</div>