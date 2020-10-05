<?php
include 'config.php';
session_start();
$auth = $_SESSION["admin_auth"];
if ($auth !== 'YES'){
    header("Location: login.php");
    exit();
}
if (!empty($_GET["id_cmd"])) {
    $commande = findCommande((int)$_GET["id_cmd"]);
    $libelle = unserialize($commande['libelle']);
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

  <style>
      #invoice{
          padding: 30px;
      }

      .invoice {
          position: relative;
          background-color: #FFF;
          min-height: 680px;
          padding: 15px
      }

      .invoice header {
          padding: 10px 0;
          margin-bottom: 20px;
          border-bottom: 1px solid #3989c6
      }

      .invoice .company-details {
          text-align: right
      }

      .invoice .company-details .name {
          margin-top: 0;
          margin-bottom: 0
      }

      .invoice .contacts {
          margin-bottom: 20px
      }

      .invoice .invoice-to {
          text-align: left
      }

      .invoice .invoice-to .to {
          margin-top: 0;
          margin-bottom: 0
      }

      .invoice .invoice-details {
          text-align: right
      }

      .invoice .invoice-details .invoice-id {
          margin-top: 0;
          color: #3989c6
      }

      .invoice main {
          padding-bottom: 50px
      }

      .invoice main .thanks {
          margin-top: -100px;
          font-size: 2em;
          margin-bottom: 50px
      }

      .invoice main .notices {
          padding-left: 6px;
          border-left: 6px solid #3989c6
      }

      .invoice main .notices .notice {
          font-size: 1.2em
      }

      .invoice table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px
      }

      .invoice table td,.invoice table th {
          padding: 15px;
          background: #eee;
          border-bottom: 1px solid #fff
      }

      .invoice table th {
          white-space: nowrap;
          font-weight: 400;
          font-size: 16px
      }

      .invoice table td h3 {
          margin: 0;
          font-weight: 400;
          color: #3989c6;
          font-size: 1.2em
      }

      .invoice table .qty,.invoice table .total,.invoice table .unit {
          /*text-align: right;*/
          font-size: 1.2em
      }

      .invoice table .no {
          color: #fff;
          font-size: 1.6em;
          background: #3989c6
      }

      .invoice table .unit {
          background: #ddd
      }

      .invoice table .total {
          background: #3989c6;
          color: #fff
      }

      .invoice table tbody tr:last-child td {
          border: none
      }

      .invoice table tfoot td {
          background: 0 0;
          border-bottom: none;
          white-space: nowrap;
          text-align: right;
          padding: 10px 20px;
          font-size: 1.2em;
          border-top: 1px solid #aaa
      }

      .invoice table tfoot tr:first-child td {
          border-top: none
      }

      .invoice table tfoot tr:last-child td {
          color: #3989c6;
          font-size: 1.4em;
          border-top: 1px solid #3989c6
      }

      .invoice table tfoot tr td:first-child {
          border: none
      }

      .invoice footer {
          width: 100%;
          text-align: center;
          color: #777;
          border-top: 1px solid #aaa;
          padding: 8px 0
      }

      @media print {
          .invoice {
              font-size: 11px!important;
              overflow: hidden!important
          }

          .invoice footer {
              position: absolute;
              bottom: 10px;
              page-break-after: always
          }

          .invoice>div:last-child {
              page-break-before: always
          }
      }
  </style>
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
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                      <div id="invoice">

                          <div class="toolbar hidden-print">
                              <div class="text-right">
                                  <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Imprimer</button>
                              </div>
                              <hr>
                          </div>
                          <div id="element-to-print" class="invoice overflow-auto">
                              <div style="min-width: 600px">
                                  <header>
                                      <div class="row">
                                          <div class="col">
                                              <a style="display: block" href="">
                                                  <img class="img-sm" src="assets/images/logo.jpeg" data-holder-rendered="true" />
                                              </a>
                                          </div>
                                          <div class="col company-details">
                                              <h2 class="name">
                                                  <a href="">
                                                      Chez Rifat
                                                  </a>
                                              </h2>
                                              <div>Marcory Zone AZ</div>
                                              <div>(+225) 23004500</div>
                                              <div>chezrifat@gmail.com</div>
                                          </div>
                                      </div>
                                  </header>
                                  <main>
                                      <div class="row contacts">
                                          <div class="col invoice-to">
                                              <div class="text-gray-light">FACTURE DE:</div>
                                              <h2 class="to"><?php echo $commande['nom_client']?> <?php echo $commande['prenoms_client']?></h2>
                                              <div class="address"><?php echo $commande['adresse_livraison_client']?></div>
                                              <div class="email"><span><?php echo $commande['contact']?></span></div>
                                          </div>
                                          <div class="col invoice-details">
                                              <h1 class="invoice-id">FACTURE-<?php echo $commande["id_cmd"] ?></h1>
                                              <div class="date">Date de commande: <?php echo $commande["date_cmd"] ?></div>
                                              <div class="date">Date de livraison: <?php echo $commande["date_livraison"] ?> à <?php echo $commande["heure_livraison"] ?></div>
                                          </div>
                                      </div>
                                      <table border="0" cellspacing="0" cellpadding="0">
                                          <thead>
                                          <tr>
                                              <th>#</th>
                                              <th class="">DESCRIPTION</th>
                                              <th class="">LIEU DE LIVRAISON</th>
                                              <th class="">REFERENCE PAIEMENT</th>
                                              <th class="">TOTAL A PAYER</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                              <td class="no">
                                                  <?php echo $commande["id_cmd"] ?>
                                              </td>
                                              <td class="">
                                                  <?php echo $libelle[0]; ?>
                                              </td>
                                              <td class="unit">
                                                  <?php echo $commande["lieu_livraison"] ?>
                                              </td>
                                              <td class="qty">
                                                  <?php echo $commande["ref_commande"] ?>
                                              </td>
                                              <td class="total">
                                                  <?php echo $commande["montant"] ?> F CFA
                                              </td>
                                          </tr>
                                          </tbody>
                                          <tfoot>
                                          </tfoot>
                                      </table>
                                  </main>
                                  <footer>
                                      Restaurant chez Rifat
                                  </footer>
                              </div>
                              <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                              <div></div>
                          </div>
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
    <script src="assets/js/html2pdf.bundle.js"></script>
    <!-- End custom js for this page -->

    <script>
        $(function () {
            var btn = $('#printInvoice');
            btn.on('click', function () {
                var element = document.getElementById('element-to-print');
                html2pdf(element);
            })
        })
    </script>
  </body>
</html>