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
      $sql = "SELECT * FROM patient WHERE Pat_IC=".$_GET['Pat_IC'];
      $result = mysqli_query($conn, $sql);
      $row3 = mysqli_fetch_assoc($result); 
      $sql2 = "SELECT * FROM result WHERE R_No=".$_GET['R_No'];
      $result2 = mysqli_query($conn, $sql2);
      $row4 = mysqli_fetch_assoc($result2); 
      $sql3 = "SELECT * FROM result, patient, cause, symptom WHERE patient.username = result.username AND cause.username = result.username AND symptom.username = result.username AND symptom.R_No = result.R_No AND cause.R_No = result.R_No AND result.R_No = ".$row4['R_No'];
      $result3 = mysqli_query($conn, $sql3);
      $row5 = mysqli_fetch_assoc($result3);
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
                <h3>Patient's Eye Details</h3>
              </div>

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Eye Condition Test</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td>Patient's Name: </td>
                          <td><?php echo $row5['Pat_Name']; ?></td>
                        </tr>
                        <tr>
                          <td>Test Date:</td>
                          <td><?php echo $row5['R_Date']; ?></td>
                        </tr>
                        <tr>
                          <td>Test Result:</td>
                          <td><b><h4><?php echo $row5['R_FinalResult']; ?></h4></b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tbody>
                          <tr>
                            <th colspan="2"><h4>Section A</h4></th>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Causes/Risk Factors : <b><u><?php echo $row5['C_Result']?></u></b></h4></th>
                          </tr>
                          <tr>
                            <th>Duration of having Diabetes: </th>
                            <td style="width: 50%;"><?php echo $row5['C_Dura']?></td>
                          </tr>
                          <tr>
                            <th>Blood Pressure: </th>
                            <td><?php echo $row5['C_Pres']?></td>
                          </tr>
                          <tr>
                            <th>Smoking Habit: </th>
                            <td><?php echo $row5['C_Smok']?></td>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Section B</h4></th>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Symptoms : <b><u><?php echo $row5['S_Result']?></u></b></h4></th>
                          </tr>
                          <tr>
                            <th>Blurry: </th>
                            <td><?php echo $row5['S_Blurry']?></td>
                          </tr>
                          <tr>
                            <th>Colours: </th>
                            <td><?php echo $row5['S_Colours']?></td>
                          </tr>
                          <tr>
                            <th>Night: </th>
                            <td><?php echo $row5['S_Night']?></td>
                          </tr>
                          <tr>
                            <th>Floaters: </th>
                            <td><?php echo $row5['S_Floaters']?></td>
                          </tr>
                          <tr>
                            <th>loss: </th>
                            <td><?php echo $row5['S_Loss']?></td>
                          </tr>
                          <tr>
                            <th><h4>The probability risk in getting diabetic retinopathy based on the causes and symptoms is </h4></th>
                            <td><h4><b><u><?php echo $row5['R_FinalResult']?></u></b></h4></td>
                          </tr>
                          <tr>
                            <td colspan="2"><center><a href="Patient_EyeTestRecord.php?Pat_IC=<?php echo $row3['Pat_IC']?>" class="btn btn-primary">Back to Eye Test List</a></center></td>
                          </tr>
                        </tbody>
                      </tbody>
                    </table>

                  </div>
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