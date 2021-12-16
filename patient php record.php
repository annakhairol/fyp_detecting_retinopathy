
                                         <!--    <?php
                              $sql = "SELECT * FROM activity";               
                                 
                                         $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                         $count = 0;
                                         if (mysqli_num_rows($result)==0){
                                         echo "Data Not Found";
                                          }
                                         else{
                                          while($row = mysqli_fetch_assoc($result))                      
                                {   
                                  $count++;
                            ?>
                          <tr><form name="memberform" method="post" action="">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row["Activity_Name"]; ?></td>
                            <td><?php echo $row["Activity_Date"]; ?></td>
                            <td><?php echo $row["Activity_Venue"]; ?></td>
                            <td><?php echo $row["Activity_Description"]; ?></a></td>
                          </tr></form>
                         
                        <?php } }?> -->
                        </tbody>
                    </table>
                  </div>
                        <!-- <?php
                            $rec_count = mysqli_num_rows($result);
                              
                            if ($rec_count > 0)
                              echo "<br /><br />Number of Activity : ". $rec_count;
                            else
                              echo "No records found";
                          ?> -->