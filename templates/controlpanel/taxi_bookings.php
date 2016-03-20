<div id="transport_companiesDiv" style="display: block" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h5>Taxi Bookings</h5>
                            
                        </div>
                        <form style="margin-bottom: 10px;">
                                <i class="fa fa-search"><input style="width:20%; height: 30px" type="text" classname="search"  Placeholder="Search"></i>
                        </form>
                        <div class="modal-body">
                            
                            <div>
                                <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                        <th>Service provider</th>
                                        <th>Pickup point</th>
                                        <th>Stoppage point</th>
                                        <th>Pickup date</th>
                                        <th>Pickup time</th>
                                        <th>Amount paid</th>
                                        <th>Pin</th>
                                        <th>Serial</th>
                                        
                                    </tr>
                                    <?php
                    /* Get total number of records */
                    $sql = "SELECT * FROM taxi_bookings";
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
                    $sql = "SELECT * FROM taxi_bookings " . "LIMIT  $rec_limit OFFSET $offset";

                    $retval = mysql_query($sql);

                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }

                    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo "<tr>
                                                    <td>" . $row['date_of_payment'] . "</td>
                                                    <td>" . $row['status'] . "</td>
                                                    <td>" . $row['lastname'] . " " . $row['firstname']  . "</td>
                                                    <td>" . $row['service_provider'] . "</td>
                                                    <td>" . $row['pickup_point'] . "</td>
                                                    <td>" . $row['stoppage_point'] . "</td>
                                                    <td>" . $row['pickup_date'] . "</td>
                                                    <td>" . $row['pickup_time'] . "</td>
                                                    <td>" . $row['amount_paid'] . "</td>
                                                    <td>" . $row['pin'] . "</td>
                                                    <td>" . $row['serial'] . "</td>
                                                    <td> <span class='f-button'>more</span> </td>
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
                            echo '<li><a href="?view=taxi_bookings&page=' . $prev .'"><<</a></li>';
                        }

                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=taxi_bookings&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }

                        if($next < $pages){
                            echo '<li><a href="?view=taxi_bookings&page='  . $next  . '">>></a></li>';
                        }
                    }else  {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1 ) {
                            echo '<li><a href="?view=taxi_bookings&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }
                    }
                    
                    
                    ?>
                                </ul>
                            </div> 


                        </div>
                        <br/>

<!--                        <div class="modal-footer">
                            <span class="f-button">Add New</span>
                            
                        </div>-->

                    </div>

                </div>