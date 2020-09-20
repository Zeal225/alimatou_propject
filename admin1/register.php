

<?php
include 'config.php';

$register_error_message = '';
if (!empty($_POST["btn-register"])) {
    if ($_POST['first_name'] == "") {
        $register_error_message = 'Le nom est obligatoire';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Le email est obligatoire';
    } else if ($_POST['last_name'] == "") {
        $register_error_message = 'Le prenom est obligatoire';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Le mot de passe est obligatoire';
    }else if (isEmail($_POST['email'])){
        $register_error_message = 'Cet email existe déjà';
    }
    else {
        $new_user = createdUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
        //$_SESSION['user_id'] = $user_id;
        header("Location: index.php");
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
                  <h1>CHEZ RIFAT</h1>
                </div>
                <h4>AJOUTER UN NOUVEL ADMINISTRATEUR</h4>
                  <?php
                  if ($register_error_message != "") {
                      echo '<div style="border-radius: 0 !important;" class="alert alert-danger"><strong>Erreur: </strong> ' . $register_error_message . '</div>';
                  }
                  ?>
                <form action="register.php" method="post" class="pt-3">

                  <div class="form-group">
                    <input name="first_name" type="text" class="form-control form-control-lg" id="first_name" placeholder="Nom">
                  </div>

                  <div class="form-group">
                    <input name="last_name" type="text" class="form-control form-control-lg" id="last_name" placeholder="Prenom(s)">
                  </div>
                  <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Mot de passe">
                  </div>

                  <div class="mt-3">
                    <input name="btn-register" type="submit" value="VALIDER" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
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