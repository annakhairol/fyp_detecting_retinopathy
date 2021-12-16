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
<style type="text/css">
  td{padding: 10px;}
</style>

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
                <h3>Eye Condition Test</h3>
              </div>

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h5>If you are getting blurry vision, impairedment of colour vision, poor night vision or sudden and total loss vision, do visit the hospital immediately. </h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"></div>
                </div>
              </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Diabetic Retinopathy Probability Test</h3>
                    <div class="clearfix"></div>
                  </div>
                  <h4>Your result is...</h4>
                <!-- write the php code here -->
                <?php

                $query2 = mysqli_query($conn,"SELECT * FROM cause WHERE username = '$username' ORDER BY C_NO DESC");
                $row2 = mysqli_fetch_assoc($query2);
                $query3 = mysqli_query($conn,"SELECT * FROM symptom WHERE username = '$username' ORDER BY S_NO DESC");
                $row3 = mysqli_fetch_assoc($query3);
                $query4 = mysqli_query($conn,"SELECT * FROM result WHERE username = '$username' ORDER BY R_NO DESC");
                $row4 = mysqli_fetch_assoc($query4);
                ?>
                <!-- write php row here to display-->
                    <!-- <div>
                      <h4>Section A</h4>
                      <h5>
                        <b>Causes/Risk Factors : <?php echo $_SESSION['cresult']?></b>
                        <ol>
                          <li>Duration of having Diabetes: <?php echo $_SESSION['duration']?></li>
                          <li>Blood Pressure: <?php echo $_SESSION['pressure']?></li>
                          <li>Smoking Habit: <?php echo $_SESSION['smoking']?></li>
                        </ol>
                      </h5>
                      <br>
                      <h4>Section B</h4>
                      <h5>
                        <b>Symptoms : <?php echo $_SESSION['sresult']?></b>
                        <ol>
                          <li>Blurry: <?php echo $_SESSION['blurry']?></li>
                          <li>Colours: <?php echo $_SESSION['colours']?></li>
                          <li>Night: <?php echo $_SESSION['night']?></li>
                          <li>Floaters: <?php echo $_SESSION['floaters']?></li>
                          <li>loss: <?php echo $_SESSION['loss']?></li>
                        </ol>
                      </h5>
                    </div> -->
                    <div>
                      <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th colspan="2"><h4>Section A</h4></th>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Causes/Risk Factors : <b><u><?php echo $row2['C_Result']?></u></b></h4></th>
                          </tr>
                          <tr>
                            <th>Duration of having Diabetes: </th>
                            <td style="width: 50%;"><?php echo $row2['C_Dura']?></td>
                          </tr>
                          <tr>
                            <th>Blood Pressure: </th>
                            <td><?php echo $row2['C_Pres']?></td>
                          </tr>
                          <tr>
                            <th>Smoking Habit: </th>
                            <td><?php echo $row2['C_Smok']?></td>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Section B</h4></th>
                          </tr>
                          <tr>
                            <th colspan="2"><h4>Symptoms : <b><u><?php echo $row3['S_Result']?></u></b></h4></th>
                          </tr>
                          <tr>
                            <th>Blurry: </th>
                            <td><?php echo $row3['S_Blurry']?></td>
                          </tr>
                          <tr>
                            <th>Colours: </th>
                            <td><?php echo $row3['S_Colours']?></td>
                          </tr>
                          <tr>
                            <th>Night: </th>
                            <td><?php echo $row3['S_Night']?></td>
                          </tr>
                          <tr>
                            <th>Floaters: </th>
                            <td><?php echo $row3['S_Floaters']?></td>
                          </tr>
                          <tr>
                            <th>loss: </th>
                            <td><?php echo $row3['S_Loss']?></td>
                          </tr>
                          <tr>
                            <th><h4>The probability risk in getting diabetic retinopathy based on the causes and symptoms is </h4></th>
                            <td><h4><b><u><?php echo $row4['R_FinalResult']?></u></b></h4></td>
                          </tr>
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
<?php
// $tmp = $_SESSION['id'];
// session_unset();
// $_SESSION['id'] = $tmp;


}
    ?>