<?php
include 'config.php';

session_start();
$auth = $_SESSION["admin_auth"];
if ($auth !== 'YES'){
    header("Location: login.php");
    exit();
}

if (!empty($_GET["id"])) {
    $produit = findProduit((int)$_GET["id"]);
}
if (!empty($_POST["modifier"])) {

    $uploaddir = 'assets/images/';
    //$front_dir = '../images/';
    $uploadfile =  $uploaddir . basename($_FILES['images']['name']);
    //$uploadfile_front =  $front_dir . basename($_FILES['images']['name']);

    if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadfile)) {
        //var_dump($uploadfile);die();
        $image_back =  basename($_FILES['images']['name']);

        //var_dump($image_back); die();
    }

    if ($_POST['name'] == "") {
        $register_error_message = 'Le nom est obligatoire';
    } else if ($_POST['description'] == "") {
        $register_error_message = 'Le email est obligatoire';
    }  else if ($_POST['prix'] == "") {
        $register_error_message = 'Le mot de passe est obligatoire';
    }
    else {
        //var_dump($image_back); die();
        try {
            if (empty($_FILES['images']['name'])){
                $image_back = $_POST['images_old'];
            }
            $new_user = updateProduit($_POST['name'], $_POST['prix'], $image_back, $_POST['description'], $_POST['remise'], (int)$_POST["id"]);
            header("Location: produits.php");
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
                </span> Modifier le produit </h3>

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
                                <form action="modifier_produit.php" method="post" class="forms-sample" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $produit["id"] ?>">
                                        <label for="exampleInputUsername1">Libelle produit</label>
                                        <input name="name" value="<?php echo $produit["name"] ?>" type="text" class="form-control" id="name" placeholder="libelle produit">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea name="description"  type="text" class="form-control" rows="4" id="description" placeholder="description"><?php echo $produit["description"] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <img class="img-lg" src="assets/images/<?php echo $produit["images"] ?>">
                                        </div>
                                        <input name="images" value="<?php echo $produit["images"] ?>" type="file" class="form-control" id="images" placeholder="Images">
                                        <input name="images_old" value="<?php echo $produit["images"] ?>" type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="prix">Prix</label>
                                        <input name="prix" value="<?php echo $produit["prix"] ?>" type="text" class="form-control" id="prix" placeholder="prix">
                                    </div>

                                    <div class="form-group">
                                        <label for="prix">Remise</label>
                                        <input name="remise" value="<?php echo $produit["remise"] ?>" type="number" class="form-control" id="remise" placeholder="remise">
                                    </div>
                                    <input name="modifier" type="submit" value="Modifier" class="btn btn-gradient-primary mr-2">
                                    <a href="produits.php" class="btn btn-light">Annuler</a>
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