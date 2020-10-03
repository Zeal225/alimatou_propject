<?php
include 'config.php';
$login_error_message = '';
if (!empty($_POST['btn-login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "") {
        $login_error_message = 'Entrer un email';
    } else if ($password == "") {
        $login_error_message = 'Entrer un mot de passe';
    } else {
        $user_id = login($email, $password); // check user login
        if($user_id > 0)
        {
            session_start();
            $_SESSION['admin_auth'] = 'YES'; //Set Session
            header("Location: index.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Vos identifiants de conexionn sont invalide';
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
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <h1 class="text-center">CHEZ RIFAT</h1>
                </div>
                <h4>IDENTIFIEZ-VOUS</h4>
                <!--<h6 class="font-weight-light">Sign in to continue.</h6>-->
                <form action="login.php" method="post" class="pt-3">
                  <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe">
                  </div>
                  <div class="mt-3">
                    <input name="btn-login" type="submit" value="CONNEXION" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>