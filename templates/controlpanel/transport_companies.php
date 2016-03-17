<div id="transport_companiesDiv" style="display: block" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h5>Transport Companies</h5>
                            
                        </div>
                        <form style="margin-bottom: 10px;">
                                <i class="fa fa-search"><input style="width:20%; height: 30px" type="text" classname="search"  Placeholder="Search"></i>
                        </form>
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
                                        $action = "SELECT * FROM transport_companies";
                                        $query = mysql_query($action);
                                        while ($row = mysql_fetch_assoc($query)) {
                                            echo "<tr>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['tag'] . "</td>
                                                    <td>" . $row['email'] ."</td>
                                                    <td>" . $row['phone'] . "</td>
                                                    <td>" . $row['phone'] . "</td>
                                                    <td>" . $row['head_office'] . "</td>
                                                    <td> <span class='f-button'>edit</span> </td>
                                                    <td> <span class='f-button'>delete</span> </td> 
                                                  </tr>";
                                        }
                                    ?>
                                    
                                                                        
                                    
                                </table>
                            </div>
                            <div>
                                <ul class="pagination">
                                    <li><a href="#"><<</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a class="active" href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>

                                    <li><a href="#">>></a></li>
                                </ul>
                            </div> 


                        </div>
                        <br/>

                        <div class="modal-footer">
                            <span class="f-button">Add New</span>
                            
                        </div>

                    </div>

                </div>