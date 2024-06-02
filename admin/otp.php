<?php

    include 'config.php';
    $msg = "";

    // if (isset($_GET['email'])) {
    //     if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
    //         $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
    //         if ($query) {
    //             $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
    //         }
    //     } else {
    //         header("Location: index.php");
    //     }
    // }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $otp = mysqli_real_escape_string($conn, $_POST['otp']);
        $sql = "SELECT * FROM users WHERE email='{$email}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['code'] == $otp){
          $sql = "UPDATE users SET code='' WHERE code='$otp' AND email='$email'";
          $result = mysqli_query($conn, $sql);
          
          if ($result) {
              header("Location: login.php?Verification_Successful");
              // header("Location: login.php?Verification_Successful");
              echo $result;
          } else {
              $msg = "<div class='alert alert-danger'>OTP do not match.</div>";
          }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <?php echo $msg; ?>
              <div class="brand-logo">
                <img src="logo-mini.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Enter The OTP.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="otp" placeholder="OTP">
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">                    
                      Submit
                    </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Resend OTP <a href="resend-email-verification.php" class="text-primary">Click</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
