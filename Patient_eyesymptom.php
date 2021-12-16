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
                  <!-- <div class="x_panel" style="padding-left: 150px; padding-right: 150px; padding-top: 50px; padding-bottom: 50px;"> -->
                  <form method="post">
                  <!-- Section B -->
                    <h4><b>Section B</b></h4>
                     <ol>
                        <li>
                            <div></div>
                            <h4><b>Do you feel that your vision getting blurry?</b></h4>
                            <div>
                                <input  type="radio" class="iradio_flat-green" name="blurry"  value="Rarely" />
                                <label>Rarely</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="blurry" value="Sometimes" />
                                <label>Sometimes</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="blurry" value="Always" />
                                <label>Always</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you have problem seeing colours in your sight?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="colours" value="Rarely" />
                                <label>Rarely</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="colours" value="Sometimes" />
                                <label>Sometimes</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="colours" value="Always" />
                                <label>Always</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you have problem seeing things at night?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="night" value="Rarely" />
                                <label>Rarely</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="night"  value="Sometimes" />
                                <label>Sometimes</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="night" value="Always" />
                                <label>Always</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you feel your vision being blocked by patcher,floaters or colourless spots?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="floaters"  value="Rarely" />
                                <label>Rarely</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="floaters" value="Sometimes" />
                                <label>Sometimes</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="floaters" value="Always" />
                                <label>Always</label>
                            </div>
                        </li>
                        <li>
                            <div></div>
                            <h4><b>Do you experience any sudden or total loss of vision before?</b></h4>
                            <div>
                                <input type="radio" class="iradio_flat-green" name="loss" value="Rarely" />
                                <label>Rarely</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="loss" value="Sometimes" />
                                <label>Sometimes</label>
                                <span style="margin-left: 15%"></span>
                                <input type="radio" class="iradio_flat-green" name="loss" value="Always" />
                                <label>Always</label>
                            </div>
                        </li>
                            <!-- go to next section -->
                    </ol>
                    <input type="button" name="previousbtn" value="Previous" class="btn btn-danger" onclick="document.location.href='Patient_eyecause.php'"> 
                    <input type="submit" name="resultbtn" value="Check Result Now" class="btn btn-success" style="margin-left:75%;"> 
                    <!-- End of Section B -->
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
    $symptom_blurry = "";
    $symptom_colours = "";
    $symptom_night = "";
    $symptom_floaters = "";
    $symptom_loss = "";
    $symptom_result = "";
    $final_result = "";
    $errors = ""; 
    // REGISTER USER
    if (isset($_POST['resultbtn'])) {
      // receive all input values from the form
      $symptom_blurry = mysqli_real_escape_string($conn,$_POST['blurry']);
      $symptom_colours = mysqli_real_escape_string($conn,$_POST['colours']);
      $symptom_night = mysqli_real_escape_string($conn,$_POST['night']);
      $symptom_floaters = mysqli_real_escape_string($conn,$_POST['floaters']);
      $symptom_loss = mysqli_real_escape_string($conn,$_POST['loss']);

      // form validation: ensure that the form is correctly filled ...
      if (empty($symptom_blurry)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Blurry vision input is required.'); </SCRIPT>"); 
          $errors++;}
      if (empty($symptom_colours)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Colours vision input is required.'); </SCRIPT>"); 
          $errors++; }
      if (empty($symptom_night)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Night vision input is required.'); </SCRIPT>"); 
          $errors++; }
      if (empty($symptom_floaters)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Floaters input is required.'); </SCRIPT>"); 
          $errors++; }
      if (empty($symptom_loss)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Loss vision input is required.'); </SCRIPT>"); 
          $errors++; }


          // start if conditions for symptoms
          //if blurry is rarely
          if ($symptom_blurry == 'Rarely') {
                    if ($symptom_colours == 'Rarely') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Low';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                             if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Sometimes') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Low';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Always') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    else{
                      $symptom_result = 'Undefined';
                    }
          }// END OF BLURRY RARELY
          elseif ($symptom_blurry == 'Sometimes') {
                    if ($symptom_colours == 'Rarely') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Low';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Sometimes') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                      if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Always') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    else{
                      $symptom_result = 'Undefined';
                    }
          }
          elseif ($symptom_blurry == 'Always') {
                    if ($symptom_colours == 'Rarely') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Low';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Sometimes') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    elseif ($symptom_colours == 'Always') {
                              if ($symptom_night == 'Rarely') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Low';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Sometimes') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'Moderate';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              elseif ($symptom_night == 'Always') {
                                    if ($symptom_floaters == 'Rarely') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Sometimes') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    elseif ($symptom_floaters == 'Always') {
                                            if ($symptom_loss == 'Rarely') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Sometimes') {
                                                  $symptom_result = 'High';
                                            }
                                            elseif ($symptom_loss == 'Always') {
                                                  $symptom_result = 'High';
                                            }
                                            else{
                                                  $symptom_result = 'Undefined';
                                            }
                                    }
                                    else{
                                      $symptom_result = 'Undefined';
                                    }
                              }
                              else{
                                $symptom_result = 'Undefined';
                              }
                    }
                    else{
                      $symptom_result = 'Undefined';
                    }
          }
          else{
            $symptom_result = 'Undefined';
          }

          // end if condition for symptoms

      if($errors == 0){
              $_SESSION['sresult'] = $symptom_result;
              $_SESSION['blurry'] = $symptom_blurry;
              $_SESSION['colours'] = $symptom_colours;
              $_SESSION['night'] = $symptom_night;
              $_SESSION['floaters'] = $symptom_floaters;
              $_SESSION['loss'] = $symptom_loss;
              $cause_result = $_SESSION['cresult'];
              $cause_duration = $_SESSION['duration'];
              $cause_pressure = $_SESSION['pressure'];
              $cause_smoking = $_SESSION['smoking'];

          // header('location: Patient_Result.php');
          
          if ($cause_result == 'Low') {
                  if ($symptom_result == 'Low') {
                    $final_result = 'Low';
                  }
                  elseif ($symptom_result == 'Moderate') {
                    $final_result = 'Low';
                  }
                  elseif ($symptom_result == 'High') {
                    $final_result = 'Moderate';
                  }
                  else {
                    $final_result = 'Undefined';
                  }
          }
          elseif ($cause_result == 'Moderate') {
                  if ($symptom_result == 'Low') {
                    $final_result = 'Low';
                  }
                  elseif ($symptom_result == 'Moderate') {
                    $final_result = 'Moderate';
                  }
                  elseif ($symptom_result == 'High') {
                    $final_result = 'High';
                  }
                  else {
                    $final_result = 'Undefined';
                  }
          }
          elseif ($cause_result == 'High') {
                  if ($symptom_result == 'Low') {
                    $final_result = 'Moderate';
                  }
                  elseif ($symptom_result == 'Moderate') {
                    $final_result = 'High';
                  }
                  elseif ($symptom_result == 'High') {
                    $final_result = 'High';
                  }
                  else {
                    $final_result = 'Undefined';
                  }
          }
          else {
            $final_result = 'Undefined';
          }


          $query1 = "INSERT INTO result (R_Date, R_FinalResult,  username) 
                    VALUES(curdate(), '$final_result', '$username')";
              mysqli_query($conn, $query1);

            $sql1 = "SELECT R_No FROM result ORDER BY R_No DESC";
            $result = mysqli_query($conn, $sql1);         
            $row = mysqli_fetch_assoc($result);
            $lastid = $row['R_No'];

          $query1 = "INSERT INTO symptom (S_Blurry, S_Colours, S_Night, S_Floaters, S_Loss, S_Result, username, R_No) 
                VALUES('$symptom_blurry', '$symptom_colours', '$symptom_night','$symptom_floaters','$symptom_loss', '$symptom_result', '$username', '$lastid')";
          mysqli_query($conn, $query1);

          $query3 = "INSERT INTO cause ( C_Dura, C_Pres, C_Smok, C_Result, username, R_No) 
                    VALUES('$cause_duration', '$cause_pressure','$cause_smoking','$cause_result', '$username', '$lastid')";
              mysqli_query($conn, $query3);


              $tmp = $_SESSION['username'];
              session_unset();
              $_SESSION['username'] = $tmp;

          $URL="Patient_Result.php";
          echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

        }
      }
  }
?>
<!-- End of eye symptoms -->