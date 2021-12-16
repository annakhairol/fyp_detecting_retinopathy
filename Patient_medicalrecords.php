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
                <h3>Medical Records</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>History</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Treatment</th>
                          <th>Doctor</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                              $sql = "SELECT * FROM Doctor"; 
                       
                               $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                               $count = 0;
                               if (mysqli_num_rows($result)==0){
                                echo "Data Not Found";
                                }
                               else{
                                while($row3 = mysqli_fetch_assoc($result))   //while($row2)     
                                //if($lec_exp == $Stud_Interest)              
                                {   
                                  $count++;
                            ?>

                            <td><?php echo $count; ?></td>
                            <td><?php echo $row3["Doc_Name"]; ?></td>
                            <td><?php echo $row3["Doc_Department"]; ?></td>
                            <td><?php echo 'buat something'; ?></td>
                            <td><?php echo 'buat button request doctor/ choose doctor'; ?></td>
                        </tr>

    <?php } }?>
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


}

?>