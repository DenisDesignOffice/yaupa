<!-- The Modal -->
<div id="charter_servicesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <h5>Cities</h5>

        </div>
        <div class="searchform">
            <form class="searchbox" name="myform1" method="get" action="./cpanel_dashboard.php"  >
                <i class="fa fa-search">
                    <input  type="text"  name="search"  classname="search"  Placeholder="Search city">
                </i>
                <input class="submit" type="submit" value="Search"  classname="search">


            </form>
        </div>

        <div class="modal-body">
            <div>
                <table>
                    <tr>
                        <th>State</th>
                        <th>Town 1</th>
                        <th>Town 2</th>
                        <th>Town 3</th>
                        <th>Town 4</th>
                        <th>Town 5</th>
                        <th>Town 6</th>
                        <th>Town 7</th>
                        <th>Town 8</th>
                        <th>Town 9</th>
                        <th>Town 10</th>

                    </tr>
                    <?php
                    /* Get total number of records */
                    $sql = "";
                    if (isset($_GET{'search'})) {
                        $search = strtolower(htmlspecialchars($_GET{'search'}));
//                        $sql = "SELECT FROM transport_companies WHERE * LIKE " . '%$search%';
                        $sql = "SELECT * FROM nearby_towns WHERE destination LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM nearby_towns";
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
                        $sql = "SELECT * FROM nearby_towns WHERE destination LIKE '%$search%' " . "LIMIT  $rec_limit OFFSET $offset";
                    } else {
                        $sql = "SELECT * FROM nearby_towns " . "LIMIT  $rec_limit OFFSET $offset";
                    }

                    $retval = mysql_query($sql);

                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }

                    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo "<tr>
                                                    <td>" . $row['destination'] . "</td>
                                                    <td>" . $row['nearby_town1'] . "</td>
                                                    <td>" . $row['nearby_town2'] . "</td>
                                                    <td>" . $row['nearby_town3'] . "</td>
                                                    <td>" . $row['nearby_town4'] . "</td>
                                                    <td>" . $row['nearby_town5'] . "</td>
                                                    <td>" . $row['nearby_town6'] . "</td>
                                                    <td>" . $row['nearby_town7'] . "</td>
                                                    <td>" . $row['nearby_town8'] . "</td>
                                                    <td>" . $row['nearby_town9'] . "</td>
                                                    <td>" . $row['nearby_town10'] . '</td>
                                                    <td><a href="?view=add_city&purpose=edit&id=' . $row["id"] . '"> <span class="f-button">Edit</span></a> </td>
                                                    <td><a  href="?view=add_city&purpose=delete&id=' . $row["id"] . '"> <span class="f-button">Delete</span> </a></td> 
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

                    if ($tempMod > 0) {
                        $pages = $pages + 1;
                    }

                    if ($pages > 1 && $pages > 10) {
                        if ($prev > 0) {
                            echo '<li><a href="?view=cities&page=' . $prev . '"><<</a></li>';
                        }

                        $count = $pages;
                        $i = 1;

                        while ($count > 1) {
                            echo '<li><a href="?view=cities&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }

                        if ($next < $pages) {
                            echo '<li><a href="?view=cities&page=' . $next . '">>></a></li>';
                        }
                    } else {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1) {
                            echo '<li><a href="?view=cities&page=' . $i . '">' . $i . '</a></li>';
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
            <a href="?view=addplus_city&purpose=add"><span class="f-button">Add New</span></a>

        </div>

    </div>

</div>