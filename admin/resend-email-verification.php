<?php
session_start();

$page_title = "Login Form";
// include('includes/header.php');
// include('includes/navbar.php');
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
              <div class="brand-logo">
                <img src="logo-mini.svg" alt="logo">
              </div>
              <?php
                        if(isset($_SESSION['status']))
                        {
                            unset($_SESSION['status']);
                        }
                    ?>

            <div class="card">
                <div class="card-header">
                    <h5>Resend Email Verification</h5>
                </div>
                <div class="card-body">

                    <form action="resend-code.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="resend_email_verify_btn" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </form>
                
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>

<!-- <?php include('includes/footer.php'); ?> -->