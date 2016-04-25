<div id="transport_companiesDiv" style="display: block" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h5>Taxi Bookings</h5>
                            
                        </div>
                        <div class="searchform">
        <form class="searchbox" name="myform1" method="get" action="./cpanel_dashboard.php"  >
            <i class="fa fa-search">
                <input  type="text"  name="search"  classname="search"  Placeholder="Search by tag">
                 </i>
                <input class="submit" type="submit" value="Search"  classname="search">
           
            
        </form>
        </div>
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
                                    $sql = "";
                    if (isset($_GET{'search'})) {
                        $search = strtolower(htmlspecialchars($_GET{'search'}));
//                        $sql = "SELECT FROM transport_companies WHERE * LIKE " . '%$search%';
                        $sql = "SELECT * FROM taxi_bookings WHERE pin LIKE '%$search%'";
                    }else{
                        $sql = "SELECT * FROM taxi_bookings";
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
                            $offset = $rec_limit * $page - 10;
                        } else {
                            $offset = 0;
                        }
                    } else {
                        $page = 1;
                        $offset = 0;
                    }

                    $left_rec = $rec_count - ($page * $rec_limit);
                    if (isset($_GET{'search'})) {
                        $sql = "SELECT * FROM taxi_bookings WHERE pin LIKE '%$search%' " . "LIMIT  $rec_limit OFFSET $offset";
                    }else{
                        $sql = "SELECT * FROM taxi_bookings " . "LIMIT  $rec_limit OFFSET $offset";
                    }

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
                                                    <td>" . $row['serial'] . '</td>
                                                    <td><a href="?view=add_taxibookings&purpose=status&id=' . $row["id"] . '"> <span class="f-button">change status</span></a> </td>
                                                    <td><a onclick="delete_Travel('. "this" .');" href="?view=add_taxibookings&purpose=delete&id=' . $row["id"] . '"> <span class="f-button">delete</span> </a></td> 
                                                  </tr>';
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