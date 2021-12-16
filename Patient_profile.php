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
      }
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
                <h3>Profile</h3>
              </div>

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Personal Information</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Username:</th>
                          <td><?php echo $row2['username']; ?></td>
                        </tr>
                        <tr>
                          <th>Name:</th>
                          <td><?php echo $row2['Pat_Name']; ?></td>
                        </tr>
                        <tr>
                          <th>IC Number:</th>
                          <td><?php echo $row2['Pat_IC']; ?></td>
                        </tr>
                        <tr>
                          <th>Address:</th>
                          <td><?php echo $row2['Pat_Address']; ?></td>
                        </tr>
                        <tr>
                          <th>Mobile:</th>
                          <td><?php echo $row2['Pat_Mobile']; ?></td>
                        </tr>
                        <tr>
                          <th>Phone Number:</th>
                          <td><?php echo $row2['Pat_Telephone']; ?></td>
                        </tr>
                        <tr>
                          <th>Email:</th>
                          <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                          <td colspan="2"><center><a class="btn btn-success" href="Patient_EditProfile.php">Edit</a></center></td>
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