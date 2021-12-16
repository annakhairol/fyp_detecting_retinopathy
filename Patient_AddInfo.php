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
     <?php include 'login_meta.php'; ?>
  </head>

  <body class="login">

    <div>
      
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <center><h1><a href="Guest_Dashboard.php"><img src="../medcare/img/logo - copy.png"> MedCare Health</a></h1></center>
          <section class="login_content">
            <form  method="post">
              <h1> Personal Information </h1>
              <div>
                <input name="username" type="text" class="form-control" placeholder="<?php echo $row['username'];?>" disabled="" />
              </div>
              <div>
                <input name="email" type="email" class="form-control" placeholder="<?php echo $row['email']; ?>" disabled="" />
              </div>
              <div>
                <input name="patient_name" type="text" class="form-control" placeholder="Fullname" required="" />
              </div>
              <div>
                <input name="patient_ic" type="text" class="form-control" placeholder="IC Number" required="" />
              </div>
              <div>
                <input name="patient_address" type="text" class="form-control" placeholder="Address" required="" />
              </div>
              <div>
                <input name="patient_mobile" type="text" class="form-control" placeholder="Mobile Number" required=""/>
              </div>
              <div>
                <input name="patient_phone" type="text" class="form-control" placeholder="Telephone Number (e.g: Home, Office, etc)"  />
              </div>
              <div>
                <input style="font-size: 12px; margin-left:-100%" class="btn btn-default" type="reset" name="clearbtn" value="Clear">
                <input style="font-size: 12px; margin-left: 55%" class="btn btn-default" type="submit" name="addinfobtn" value="Save">
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>Copyright &copy; 2019 All Rights Reserved. UiTM Perlis Branch</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
<!-- Register Coding -->

<?php   
    // initializing variables
    $patient_name = "";
    $patient_ic = "";
    $patient_address = "";
    $patient_mobile = "";
    $patient_phone = "";
    $patient_id = "";
    $errors = ""; 
    // REGISTER USER
    if (isset($_POST['addinfobtn'])) {
      // receive all input values from the form
      $patient_name = mysqli_real_escape_string($conn,$_POST['patient_name']);
      $patient_ic = mysqli_real_escape_string($conn,$_POST['patient_ic']);
      $patient_address = mysqli_real_escape_string($conn,$_POST['patient_address']);
      $patient_mobile = mysqli_real_escape_string($conn,$_POST['patient_mobile']);
      $patient_phone = mysqli_real_escape_string($conn,$_POST['patient_phone']);
      $patient_id = mysqli_real_escape_string($conn,$_POST['userid']);

      // form validation: ensure that the form is correctly filled ...
      if (empty($patient_name)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Fullname is required.'); </SCRIPT>"); }
      if (empty($patient_ic)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('IC Number is required.'); </SCRIPT>"); }
      if (empty($patient_address)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Address is required.'); </SCRIPT>"); }
      if (empty($patient_mobile)) { echo (  "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Mobile is required.'); </SCRIPT>"); }
      

          $query = "INSERT INTO patient (Pat_Name, Pat_IC, Pat_Address, Pat_Telephone, Pat_Mobile, Pat_DoctorStatus, username) 
                VALUES('$patient_name', '$patient_ic', '$patient_address','$patient_phone','$patient_mobile', 'No Doctor', '$username')";
          mysqli_query($conn, $query);

          header('location: Patient_Dashboard.php');
      }
?>
<!-- End of Register -->
