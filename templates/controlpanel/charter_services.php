<!-- The Modal -->
<div id="charter_servicesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <h5>Charter Services</h5>

        </div>
        <form style="margin-bottom: 10px;">
            <i class="fa fa-search"><input style="width:20%; height: 30px" type="text" classname="search"  Placeholder="Search"></i>
        </form>
        <div class="modal-body">

            <div>
                <table>
                    <tr>
                        <th>Vehicle Type</th>
                        <th>From State</th>
                        <th>To State</th>
                        <th>From Town</th>
                        <th>To Town</th>
                        <th>Cost(To)</th>
                        <th>Cost(And fro)</th>
                        <th>Processing fee</th>
                        <th>Duration</th>
                        <th>Service Provider</th>

                    </tr>
                    <?php
                    /* Get total number of records */
                    $sql = "SELECT * FROM charter_services";
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
                    $sql = "SELECT * FROM charter_services " . "LIMIT  $rec_limit OFFSET $offset";

                    $retval = mysql_query($sql);

                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }

                    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo "<tr>
                                                    <td>" . $row['vehicle_type'] . "</td>
                                                    <td>" . $row['from_state'] . "</td>
                                                    <td>" . $row['to_state'] . "</td>
                                                    <td>" . $row['from_town'] . "</td>
                                                    <td>" . $row['to_town'] . "</td>
                                                    <td>" . $row['to_cost'] . "</td>
                                                    <td>" . $row['to_and_fro_cost'] . "</td>
                                                    <td>" . $row['processing_fee'] . "</td>
                                                    <td>" . $row['duration'] . "</td>
                                                    <td>" . $row['service_provider'] . "</td>
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
                    
                    
                    
                    if($tempMod > 0){
                        $pages = $pages + 1;
                    }

                    if ($pages > 1 && $pages > 10) {
                        echo '<li><a href="#"><<</a></li>';

                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }

                        echo '<li><a href="#">>></a></li>';
                    }else  {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
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