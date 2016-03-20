<!-- The Modal -->
<div id="charter_servicesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <h5>Travel Services</h5>

        </div>
        <form style="margin-bottom: 10px;">
            <i class="fa fa-search"><input style="width:20%; height: 30px" type="text" classname="search"  Placeholder="Search"></i>
        </form>
        <div class="modal-body">

            <div>
                <table>
                    <tr>
                        <th>Service provider</th>
                        <th>Vehicle type</th>
                        <th>From state</th>
                        <th>To state</th>
                        <th>Cost</th>
                        <th>Stoppage point</th>
                        <th>Speed limit</th>
                        <th>Bus stop</th>
                        <th>Duration</th>
                        <th>Departure time</th>
                        <th>Processing fee</th>
                        <th>Air condition</th>

                    </tr>
                    <?php
                    /* Get total number of records */
                    $sql = "SELECT * FROM travel_services";
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
                            $offset = 1;
                        }
                    } else {
                        $page = 1;
                        $offset = 1;
                    }

                    $left_rec = $rec_count - ($page * $rec_limit);
                    $sql = "SELECT * FROM travel_services " . "LIMIT  $rec_limit OFFSET $offset";

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
                                                    <td>" . $row['cost'] . "</td>
                                                    <td>" . $row['stoppage_point'] . "</td>
                                                    <td>" . $row['speed_limit'] . "</td>
                                                    <td>" . $row['last_bus_stop'] . "</td>
                                                    <td>" . $row['duration'] . "</td>
                                                    <td>" . $row['departure_time'] . "</td>
                                                    <td>" . $row['processing_fee'] . "</td>
                                                    <td>" . $row['aircondition'] . "</td>
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
                            echo '<li><a href="?view=travel_services&page=' . $prev .'"><<</a></li>';
                        }
                        
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=travel_services&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }
                        
                        if($next < $pages){
                            echo '<li><a href="?view=travel_services&page='  . $next  . '">>></a></li>';
                        }
                    }else  {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=travel_services&page=' . $i . '">' . $i . '</a></li>';
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