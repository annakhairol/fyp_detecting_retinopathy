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
          <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>
          
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Doctor</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <form method="post">
                      <?php
                            $sql = "SELECT patient.Pat_DoctorStatus, patient.username, doctor.Doc_Name, doctor.Doc_Department, Doctor.Doc_Mobile FROM patient,doctor WHERE patient.username = '$username' AND patient.Pat_DoctorStatus = doctor.Doc_Name";

                            $sql2 = "SELECT patient.Pat_DoctorStatus, patient.username, doctor.Doc_Name, doctor.Doc_Department, Doctor.Doc_Mobile FROM patient,doctor WHERE patient.username = '$username' AND patient.Pat_DoctorStatus = 'Pending'";        
                              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                       $count = 0;   
                               
                              $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                                       $count = 0;
                                       if (mysqli_num_rows($result)==0){
                                           if (mysqli_num_rows($result2)==0){  
                                            echo 'Currently, you have no doctor. Request a doctor? <br/><br/>'?>
                                           <input type='submit' name='requestbtn' class='btn btn-success' value='Request a Doctor'>
                                            <?php
                                            }
                                            else {  
                                              echo 'You have requested for a doctor. <br/><br/>'?>
                                            <input type='submit' name='cancelbtn' class='btn btn-danger' value='Cancel Request'>
                                            <?php
                                            }
                                        }
                                       else{
                                        while($row3 = mysqli_fetch_assoc($result))                      
                              {   
                          ?><thead>
                        <tr>
                          <th colspan="2">My Doctor</th>
                        </tr>
                      </thead>
                       
                      <tbody>
                        <tr>
                          <th>Doctor's Name:</th>
                          <td><?php echo $row3['Doc_Name']; ?></td>
                        </tr>
                        <tr>
                          <th>Doctor's Department:</th>
                          <td><?php echo $row3['Doc_Department']; ?></td>
                        </tr>
                        <tr>
                          <th>Doctor's Contact:</th>
                          <td><?php echo $row3['Doc_Mobile']; ?></td>
                        </tr>

                       <?php } }?>
                      </tbody>
                      </form>
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

    // REGISTER USER
    if (isset($_POST['requestbtn'])) {    

          $query = "UPDATE patient SET Pat_DoctorStatus = 'Pending' WHERE username = '$username'";
          mysqli_query($conn, $query);
              $URL="Patient_Dashboard.php";
              echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
              echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

}


    // REGISTER USER
    if (isset($_POST['cancelbtn'])) {    

          $query = "UPDATE patient SET Pat_DoctorStatus = 'No Doctor' WHERE username = '$username'";
          mysqli_query($conn, $query);
              $URL="Patient_Dashboard.php";
              echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
              echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

} 
  
     }
  
    ?>