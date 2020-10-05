<?php

include 'config.php';

session_start();
$auth = $_SESSION["admin_auth"];
if ($auth !== 'YES'){
    header("Location: login.php");
    exit();
}

$commandes = getAllCommande();
$count_commande = countCommande();
$count_produits = countProduits();


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

                </span> Commandes </h3>
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
                    <h4 class="card-title">Dernières commandes</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Date de commande </th>
                            <th> ID commande </th>
                            <th> Montant total </th>
                            <th> Reference commande </th>
                            <th> Lieu de livraison </th>
                              <th> Contat client </th>
                            <th> Status livraison </th>
                            <th> Status paiement </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($commandes as $commande) :?>
                          <tr>
                            <td>
                                <?php echo $commande["date_cmd"] ?>
                            </td>
                            <td>
                                <?php echo $commande["id_cmd"] ?>
                            </td>
                            <td>
                                <?php echo $commande["montant"] ?>
                            </td>
                              <td>
                                  <?php echo $commande["ref_commande"] ?>
                              </td>
                            <td>
                                <?php echo $commande["lieu_livraison"] ?>
                            </td>
                              <td>
                                <?php echo $commande["contact"] ?>
                            </td>
                            <td>

                                  <?php
                                  if ($commande["status_livraison"] == 'N'){
                                      ?>
                                  <label style="width: 5rem" class="badge badge-gradient-warning">EN COURS</label>
                                  <?php
                                  }else{
                                      ?>
                                      <label style="width: 5rem" class="badge badge-gradient-success">LIVREE</label>
                                  <?php
                                  }
                                  ?>

                            </td>
                            <td>
                                <?php
                                if ($commande["status_paiement"] == 'N'){
                                    ?>
                                    <label style="width: 5rem" class="badge badge-gradient-warning">EN ATTENTE</label>
                                    <?php
                                }else{
                                    ?>
                                    <label style="width: 5rem" class="badge badge-gradient-success">PAYE</label>
                                    <?php
                                }
                                ?>
                            </td>
                              <td>
                                  <a href="modifier_commande.php?id_cmd=<?php echo $commande['id_cmd'] ?>" type="button" class="btn btn-gradient-info btn-sm">Modifier</a>
                                  <a href="invoice.php?id_cmd=<?php echo $commande['id_cmd'] ?>" type="button" class="btn btn-gradient-secondary btn-sm">Imprimer</a>
                              </td>
                          </tr>
                          <?php endforeach;   ?>
                        </tbody>
                      </table>
                    </div>
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