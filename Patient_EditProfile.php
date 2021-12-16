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
                <h3>Profile</h3>
              </div>
              <!-- Personal Edit -->
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Personal Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Username:</th>
                          <td><?php echo $row['username']; ?></td>
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
                          <td><input type="text" name="Pat_Address" value="<?php echo $row2['Pat_Address'];?>"></td>
                        </tr>
                        <tr>
                          <th>Mobile:</th>
                          <td><input type="text" name="Pat_Mobile" value="<?php echo $row2['Pat_Mobile'];?>"></td>
                        </tr>
                        <tr>
                          <th>Phone Number:</th>
                          <td><input type="text" name="Pat_Telephone" value="<?php echo $row2['Pat_Telephone'];?>"></td>
                        </tr>
                        <tr>
                          <th>Email:</th>
                          <td><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2"><center><input type="submit" name="savebtn" class="btn btn-success" value="Save"></center></td>
                        </tr>
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Personal Edit -->
            <!-- Change Password -->
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Password</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Old Password:</th>
                          <td><input type="password" name="oldpassword" placeholder="Old Password" required=""></td>
                        </tr>
                        <tr>
                          <th>New Password:</th>
                          <td><input type="password" name="password1" placeholder="New Password" required=""></td>
                        </tr>
                        <tr>
                          <th>Confirm Password:</th>
                          <td><input type="password" name="password2" placeholder="Re-Type New Password" required=""></td>
                        </tr>
                        <tr>
                          <td colspan="2"><center><input type="submit" name="changebtn" class="btn btn-success" value="Change Password"></center></td>
                        </tr>
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Change Password -->
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
if (isset($_POST['savebtn'])) {
      $patient_address = addslashes($_POST['Pat_Address']);
      $patient_mobile = addslashes($_POST['Pat_Mobile']);
      $patient_phone = addslashes($_POST['Pat_Telephone']);
      $email = addslashes($_POST['email']);

      mysqli_query($conn,"UPDATE patient A INNER JOIN user B ON A.userid = B.userid SET Pat_Address = '$patient_address', Pat_Mobile = '$patient_mobile', Pat_Telephone = '$patient_phone', email = '$email' WHERE B.username = '$username'");

      echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location = 'Patient_Profile.php?result=SuccessfullyUpdated';
          </SCRIPT>");

      mysqli_close($conn);
}

if (isset($_POST['changebtn'])) {
      $old_pswd = mysqli_real_escape_string($conn,$_POST['oldpassword']);
      $new_pswd = mysqli_real_escape_string($conn,$_POST['password1']);
      $retype_pswd = mysqli_real_escape_string($conn,$_POST['password2']);
      $currentpassword = $row['password'];
      $oldpassword = md5($old_pswd);
      $newpassword = md5($new_pswd);
      $retypepassword = md5($retype_pswd);


      if (empty($old_pswd)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Old Password is required.'); </SCRIPT>"); }
      if (empty($new_pswd)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('New Password is required.'); </SCRIPT>"); }
      if (empty($retype_pswd)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Retype Password is required.'); </SCRIPT>"); }

      if($oldpassword != $currentpassword)
      {
        echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Wrong old password.'); </SCRIPT>"); 
      }
      else
      {
          if($oldpassword == $newpassword)
          {
            // code alert about same password..
            echo (  "<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Old and New Password must not the same.'); </SCRIPT>"); 
          }
          else
          {
            if ($newpassword != $retypepassword) 
            {
              //code does not match
              echo (  "<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Password are not match.'); </SCRIPT>"); 
              
            }
            else
            {
              //code does  match
              mysqli_query($conn,"UPDATE user SET password = '$newpassword' WHERE username = '$username'");

              echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location = 'Patient_Profile.php?result=SuccessfullyUpdated';
              </SCRIPT>");
            }
          } 
      }
      

      mysqli_close($conn);
  } 
}
?>