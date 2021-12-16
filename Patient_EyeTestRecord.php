<?php include ("database.php");
     $username = $_SESSION["username"];
      if(!isset($username)) 
      {
      header("Location: Guest_Dashboard.php");  
      }
      else
      {
      $query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
      $row = mysqli_fetch_assoc($query);
      $query2 = mysqli_query($conn,"SELECT * FROM patient WHERE username = '$username'");
      $row2 = mysqli_fetch_assoc($query2);
      
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
<?php include 'Patient_Meta.php'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="../medcare/img/logo - copy.png"></i> <small><span>MedCare Health</span></small></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <?php include 'Patient_menuprofile.php' ?>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php include 'Patient_sidebarmenu.php' ?>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <?php include 'Patient_topnavigation.php' ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Patient's Eye Test Records
                  <!-- <a style="margin-left: 15%;" class="btn btn-success" href="Doctor_addpatient.php">Register New Patient</a> -->
                </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Result</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                              $sql2 = "SELECT patient.Pat_IC, patient.username, result.R_Date, result.R_FinalResult, result.R_No FROM result, patient WHERE patient.username = result.username AND patient.Pat_IC = ".$row2['Pat_IC']; 
                               $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                               $count = 0;
                               if (mysqli_num_rows($result2)==0){
                                echo "Data Not Found";
                                }
                               else{   
                                while($row4 = mysqli_fetch_assoc($result2))   //while($row2)     
                                //if($lec_exp == $Stud_Interest)              
                                {
                                 
                                  $count++;
                                
                            ?>
                      <tbody>
                          <th><?php echo $count; ?></th>
                          <td width="40%"><?php echo $row4["R_Date"]; ?></td>
                          <td><?php echo $row4["R_FinalResult"]; ?></td>
                          <td width="30%"><center>
                                <!-- <a href="Doctor_patientdetails.php?Pat_IC=<?php echo $row3['Pat_IC']?>" class="btn btn-primary">View Details</a> -->
                                 <a href="Patient_EyeDetails.php?Pat_IC=<?php echo $row4['Pat_IC']?>&R_No=<?php echo $row4['R_No']?>" class="btn btn-primary">Eye Test Result Details</a></center>
                          </td>
                        </tbody>

                        <?php } 
                        // else
                        // {
                        //   echo "Data Not Found";
                        // } 
                      }?>
                    </table>
                  </div>
                          <?php
                        $rec_count = mysqli_num_rows($result2);
                          
                        if ($rec_count > 0)
                          echo "<br /><br />Number of Results : ". $rec_count;
                        else
                          echo "No records found";
                      ?>
                  </div>
                </div>
              </div>
             </div>
            </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php include 'footer.php'?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php include 'script.php ' ?>
  </body>
</html>

<?php } ?>