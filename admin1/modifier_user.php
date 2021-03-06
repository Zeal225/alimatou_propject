<?php
include 'config.php';

session_start();
$auth = $_SESSION["admin_auth"];
if ($auth !== 'YES'){
    header("Location: login.php");
    exit();
}
if (!empty($_GET["id"])) {
    $user = findUser((int)$_GET["id"]);
}
if (!empty($_POST["modifier"])) {
    //var_dump($_POST); die();
    if ($_POST['first_name'] == "") {
        $register_error_message = 'Le nom est obligatoire';
    } else if ($_POST['last_name'] == "") {
        $register_error_message = 'Le email est obligatoire';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Le prenom est obligatoire';
    }else {
        try {
            //var_dump($_POST); die();
            $new_user = updateUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], (int)$_POST["id"]);

            header("Location: users.php");
        }catch (Exception $exception){
        }
        //$_SESSION['user_id'] = $user_id;
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
    <!-- partial:partials/_navbar.html -->
    <?php include '_navbar.php'?>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?php include '_sidebar.php'?>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Modifier l'administrateur </h3>

                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>
                                <!--Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>-->
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <form action="modifier_user.php" method="post" class="forms-sample">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
                                        <label for="exampleInputUsername1">Libelle produit</label>
                                        <input name="first_name" value="<?php echo $user["first_name"] ?>" type="text" class="form-control" id="first_name" placeholder="first_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">last_name</label>
                                        <input name="last_name" value="<?php echo $user["last_name"] ?>" type="text" class="form-control" id="last_name" placeholder="prenom">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">email</label>
                                        <input name="email" value="<?php echo $user["email"] ?>" type="text" class="form-control" id="last_name" placeholder="email">
                                    </div>
                                    <input name="modifier" type="submit" value="Modifier" class="btn btn-gradient-primary mr-2">
                                    <a href="users.php" class="btn btn-light">Annuler</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020  All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Restaurant chez Rifa & coder avec <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- End custom js for this page -->
</body>
</html>