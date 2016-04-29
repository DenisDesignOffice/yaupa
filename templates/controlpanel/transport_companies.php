<div id="transport_companiesDiv" style="display: block" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">

            <h5>Transport Companies</h5>

        </div >
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
                        <th>Company Name</th>
                        <th>Tag</th>
                        <th>Email</th>
                        <th>Phone1</th>
                        <th>Phone2</th>
                        <th>Head Office</th>

                    </tr>
                    <?php
                    /* Get total number of records */
                    $sql = "";
                    if (isset($_GET{'search'})) {
                        $search = strtolower(htmlspecialchars($_GET{'search'}));
//                        $sql = "SELECT FROM transport_companies WHERE * LIKE " . '%$search%';
                        $sql = "SELECT * FROM `transport_companies` WHERE `tag` LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM transport_companies";
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
                        if ($page >= 1) {
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
                        $sql = "SELECT * FROM transport_companies WHERE tag LIKE '%$search%' " . "LIMIT  $rec_limit OFFSET $offset";
                    } else {
                        $sql = "SELECT * FROM transport_companies " . "LIMIT  $rec_limit OFFSET $offset";
                    }

                    $retval = mysql_query($sql);

                    if (!$retval) {
                        die('Could not get data: ' . mysql_error());
                    }

                    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo "<tr>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['tag'] . "</td>
                                                    <td>" . $row['email'] . "</td>
                                                    <td>" . $row['phone'] . "</td>
                                                    <td>" . $row['phone'] . "</td>
                                                    <td>" . $row['head_office'] . '</td>
                                                    <td> <a href="?view=add_company&purpose=edit&tag=' . $row["tag"] . '"><span class="f-button">edit</span></a> </td>
                                                    <td> <a href="?view=add_company&purpose=delete&tag=' . $row["tag"] . '"><span class="f-button">delete</span></a> </td> 
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
                            echo '<li><a href="?view=transport_companies&page=' . $prev . '"><<</a></li>';
                        }

                        $count = $pages;
                        $i = 1;

                        while ($count > 1) {
                            echo '<li><a href="?view=transport_companies&page=' . $i . '">' . $i . '</a></li>';
                            $count = $count - 1;
                            $i++;
                        }

                        if ($next < $pages) {
                            echo '<li><a href="?view=charter_services&page=' . $next . '">>></a></li>';
                        }
                    } else {
                        $count = $pages;
                        $i = 1;

                        while ($count > 1) {
                            echo '<li><a href="?view=transport_companies&page=' . $i . '">' . $i . '</a></li>';
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
            <a href="?view=add_company&purpose=add"><span class="f-button">Add New</span></a>
        </div>

    </div>

</div>