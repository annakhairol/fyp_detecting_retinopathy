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
    <!-- onload="window.location.href = '#mmq'" -->
  <body class="nav-md" >
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
                  <form method="post">
                  <!-- Section A -->  
                    <h4><b>Section A</b></h4>
                    <ol>
                        <li>
                            <div></div>
                            <h4><b>How long have you been diagnosed as diabetes patient?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="Duration"value="Less than 5 years" />
                                <label>Less than 5 years</label>
                            <span style="margin-left: 12%"></span>
                                <input type="radio" class="iradio_flat-green" name="Duration" value="5 to 10 years" />
                                <label>5 to 10 years</label>
                            <span style="margin-left: 11%"></span>
                                <input type="radio" class="iradio_flat-green" name="Duration" value="more than 10 years" />
                                <label>more than 10 years</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you experience high blood pressure?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="Pressure" value="No" />
                                <label>No</label>
                            <span style="margin-left: 21.5%"></span>
                                <input type="radio" class="iradio_flat-green" name="Pressure" value="Sometimes" />
                                <label>Sometimes</label>
                            <span style="margin-left: 12%"></span>
                                <input type="radio" class="iradio_flat-green" name="Pressure" value="Yes" />
                                <label>Yes</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you smoke?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="Smoking" value="Never" />
                                <label>Never</label>
                            <span style="margin-left: 19.5%"></span>
                                <input type="radio" class="iradio_flat-green" name="Smoking" value="Sometimes" />
                                <label >Sometimes</label>
                            <span style="margin-left: 12%"></span>
                                <input type="radio" class="iradio_flat-green" name="Smoking"  value="Always" />
                                <label >Always</label>
                            </div>
                        </li>
                    </ol>
                    <!-- End of Section A -->     
                    <input type="submit" name="nextbtn" value="Next" class="btn btn-primary" style="margin-left:90%;">               
                  </form>
                <!-- </div> -->
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
    // initializing variables
    $cause_duration = "";
    $cause_pressure = "";
    $cause_smoking = "";
    $errors = ""; 
    $cause_result = "";

    // REGISTER USER
    if (isset($_POST['nextbtn'])) {
      // receive all input values from the form
      $cause_duration = mysqli_real_escape_string($conn,$_POST['Duration']);
      $cause_pressure = mysqli_real_escape_string($conn,$_POST['Pressure']);
      $cause_smoking = mysqli_real_escape_string($conn,$_POST['Smoking']);

      // form validation: ensure that the form is correctly filled ...
      if (empty($cause_duration)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Diabetes duration input is required.'); </SCRIPT>"); 
          $errors++; }
      if (empty($cause_pressure)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('High blood pressure input is required.'); </SCRIPT>"); 
          $errors++; }
      if (empty($cause_smoking)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Smoking input is required.'); </SCRIPT>"); 
          $errors++; }

          // start if condition for cause
          // if condition for first stage result //less than 5 years
          if ($cause_duration == 'Less than 5 years') //Q1
          {
            if (($cause_pressure == 'No' && $cause_smoking == 'Never')||
                ($cause_pressure == 'No' && $cause_smoking == 'Sometimes')||
                ($cause_pressure == 'Sometimes' && $cause_smoking == 'Never')||
                ($cause_pressure == 'Yes' && $cause_smoking == 'Never')) 
                {
                  $cause_result = 'Low'; 
                }
              elseif (($cause_pressure == 'No' && $cause_smoking == 'Always')||
                      ($cause_pressure == 'Sometimes' && $cause_smoking == 'Sometimes')||
                      ($cause_pressure == 'Sometimes' && $cause_smoking == 'Always')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Sometimes')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Always')) 
              {
                $cause_result = 'Moderate';
              }
              else
              {
                $cause_result = "Undefined";
              }
          }
          // if condition for first stage result //between 5 - 10 years
          elseif ($cause_duration == '5 to 10 years') {
            if (($cause_pressure == 'No' && $cause_smoking == 'Never')||
                ($cause_pressure == 'No' && $cause_smoking == 'Sometimes')||
                ($cause_pressure == 'Sometimes' && $cause_smoking == 'Never')) 
                {
                  $cause_result = 'Low';
                }
              elseif (($cause_pressure == 'No' && $cause_smoking == 'Always')||
                      ($cause_pressure == 'Sometimes' && $cause_smoking == 'Sometimes')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Never')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Sometimes')) 
              {
                $cause_result = 'Moderate';
              }
              elseif (($cause_pressure == 'Sometimes' && $cause_smoking == 'Always')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Always')) 
              {
                $cause_result = 'High';
              }
              else
              {
                $cause_result = 'Undefined';
              }
          }
          // if condition for first stage result
          elseif ($cause_duration == 'more than 10 years')
          {
            if (($cause_pressure == 'No' && $cause_smoking == 'Never')||
                ($cause_pressure == 'No' && $cause_smoking == 'Sometimes')||
                ($cause_pressure == 'Sometimes' && $cause_smoking == 'Never')) 
                {
                  $cause_result = 'Low';
                }
              elseif (($cause_pressure == 'Sometimes' && $cause_smoking == 'Sometimes')||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Never') ||
                      ($cause_pressure == 'No' && $cause_smoking == 'Always'))
              {
                $cause_result = 'Moderate';
              }
              elseif (($cause_pressure == 'Sometimes' && $cause_smoking == 'Always') ||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Sometimes') ||
                      ($cause_pressure == 'Yes' && $cause_smoking == 'Always')) 
              {
                $cause_result = 'High';
              }
              else
              {
                $cause_result = 'Undefined';
              }
          }
          else
          {
            $cause_result = 'Undefined';
          }

          // end if condition for cause

          //Query for database insert
          if($errors == 0){
              $_SESSION['cresult'] = $cause_result;
              $_SESSION['duration'] = $cause_duration;
              $_SESSION['pressure'] = $cause_pressure;
              $_SESSION['smoking'] = $cause_smoking;
              // header('location: Patient_eyesymptom.php');
              // $query = "INSERT INTO cause ( C_Dura, C_Pres, C_Smok, C_Result, username) 
              //       VALUES('$cause_duration', '$cause_pressure','$cause_smoking','$cause_result', '$username')";
              // mysqli_query($conn, $query);

              $URL="Patient_eyesymptom.php";
              echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
              echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
      }
  }
?>
<!-- End of eye cause -->
