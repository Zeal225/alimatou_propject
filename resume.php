<?php require 'header.php';?>
<?php
if(isset($_GET['del'])){
  $panier->del($_GET['del']);

}
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">Resumé commande</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <form method="post" action="panier.php">
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>Libellé commande</th>
                    <th>Montant total</th>
                  </tr>
                </thead>




   <?php  
   $ids = array_keys($_SESSION['panier']);
if(empty($ids)){
  $products=array();
}else{
$products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
}



?>


                <tbody>
                  <tr class="">
                      <td>
                          <?php
                          session_start();
                          $data = unserialize($_SESSION["designation"]);
                          for ($x = 0; $x <= count($data); $x++) {
                              echo "<em><b>".$data[$x]."</em></b> <br>";
                          }
                          ?>
                      </td>
                    <td class="image-prod">
                        <?php
                        echo "<b>".number_format($_SESSION["montant_total"], 0, ',', ' ')." F CFA</b>";
                        ?>
                    </td>
                  </tr><!-- END TR-->
     
                </tbody>
          </table>
        </form>
            </div>
          </div>
        </div>
        <br/>
          <center>
            <div>
                <?php
                //Credential
                $apikey = '7724396325a61cf7bcf0f23.39853641';
                $cpm_site_id = '525267';

                //Post Parameters
                $cpm_amount = 100; //Le montant de la transaction
                $cpm_version = 'V1';
                $cpm_language = 'fr';
                $cpm_currency = 'CFA';
                $cpm_page_action = 'PAYMENT';
                $cpm_custom = 'PAIEMENTTEST';
                $cpm_payment_config = 'SINGLE';
                $cpm_designation = 'PAIEMENTTEST'; //Le produit acheter
                $cpSecure = "https://secure.cinetpay.com";

                $cpm_trans_date = date("Y-m-d H:i:s");
                $cpm_trans_id = 'BELV-' . (string)date("YmdHis"); //J'ai ajouter 'Test-' pour eviter les duplication dans CP
                $return_url = ""; //Le client sera rediriger vers cette url apres son paiement
                $notify_url = "";
                $cancel_url = "";
                $signatureUrl = "https://api.cinetpay.com/v1/?method=getSignatureByPost";

                //Data that will be send in the form
                $getSignatureData = array(
                    'apikey' => $apikey,
                    'cpm_amount' => $cpm_amount,
                    'cpm_custom' => $cpm_custom,
                    'cpm_site_id' => $cpm_site_id,
                    'cpm_version' => $cpm_version,
                    'cpm_currency' => $cpm_currency,
                    'cpm_trans_id' => $cpm_trans_id,
                    'cpm_language' => $cpm_language,
                    'cpm_trans_date' => $cpm_trans_date,
                    'cpm_page_action' => $cpm_page_action,
                    'cpm_designation' => $cpm_designation,
                    'cpm_payment_config' => $cpm_payment_config
                );
                // use key 'http' even if you send the request to https://...
                $options = array(
                    'http' => array(
                        'method' => "POST",
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                        'content' => http_build_query($getSignatureData)
                    )
                );

                $context = stream_context_create($options);
                $result = file_get_contents($signatureUrl, false, $context);
                if ($result === false) {
                    /* Handle error */
                    \header($return_url);
                    exit();
                }


                $signature = json_decode($result);
                ?>
                <form action="<?php echo $cpSecure;?>" method="post">
                    <input type="hidden" value="<?php echo $apikey; ?>" name="apikey">
                    <input type="hidden" value="<?php echo $_SESSION["montant_total"]; ?>" name="cpm_amount">
                    <input type="hidden" value="<?php echo $cpm_custom; ?>" name="cpm_custom">
                    <input type="hidden" value="<?php echo $cpm_site_id; ?>" name="cpm_site_id">
                    <input type="hidden" value="V1" name="cpm_version">
                    <input type="hidden" value="CFA" name="cpm_currency">
                    <input type="hidden" value="<?php echo $cpm_trans_id; ?>" name="cpm_trans_id">
                    <input type="hidden" value="fr" name="cpm_language">
                    <input type="hidden" value="<?php echo $getSignatureData['cpm_trans_date']; ?>" name="cpm_trans_date">
                    <input type="hidden" value="PAYMENT" name="cpm_page_action">
                    <input type="hidden" value="<?php echo $cpm_designation; ?>" name="cpm_designation">
                    <input type="hidden" value="SINGLE" name="cpm_payment_config">
                    <input type="hidden" value="<?php echo $signature; ?>" name="signature">
                    <input type="hidden" value="<?php echo $return_url; ?>" name="return_url">
                    <input type="hidden" value="<?php echo $cancel_url; ?>" name="cancel_url">
                    <input type="hidden" value="<?php echo $notify_url; ?>" name="notify_url">
                    <!-- <input type="hidden" value="1" name="debug"> -->
                    <p><a href="#"><input type="submit" value="Procéder au paiement" class="btn btn-primary py-3 px-4" name="add"></a></p>
                </form>
          </div>
        </center>
        <?php 
        /*echo'<div class="row justify-content-end">
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Coupon Code</h3>
              <p>Entrez votre coupon si vous en avez un</p>
              <form action="checkout.php" method="post" class="info">
          
                <div class="form-group">
                  <label for="">Code coupon</label>
                  <input type="varchar" class="form-control text-left px-3" placeholder="Saisissez le coupon" name="libelle_coupon">
                
            
              
                </div>

             
            </div>

            <p><div><button type="submit" class="btn btn-primary py-3 px-4" name="appliquer">Valider</button></div></p>
             </form>
          </div>';*/
          ?>
 
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
               <?php
               /*<h3>Facture</h3>
              <p class="d-flex">
                <span>Sous-Total</span>
                <?php
                echo number_format($panier->total(),2,',',' ' ); echo" FCFA";
                ?>
              </p>
             
              /*echo(<p class="d-flex">
                <span>Livraison</span>);
                
                if($panier->total()>10000){
                echo number_format (0,2,',',' ');echo" FCFA";
                }
                else{
                echo number_format (1000,2,',',' ');echo" FCFA";
                }*/
              
              ?>
               <?php
              /*</p>
              <p class="d-flex">
                <span>Remise</span>
                <span>0.00 FCFA</span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
           
                /*if($panier->total()>10000){
                echo number_format($panier->total(),2,',',' ' ); echo" FCFA";
              }else{
                echo number_format($panier->total()+1000,2,',',' ' ); echo" FCFA";
              
              </p>
            </div>

            <p><a href="checkout.php" class="btn btn-primary py-3 px-4">Proc&eacute;der au paiement</a></p>
             <h3><a href="shop.php">Continuer shopping</a></h3>
          </div>
        </div>
      </div>
}*/
              ?>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
            <span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
          <div class="mouse">
            <a href="#" class="mouse-icon">
              <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
            </a>
          </div>
        </div>


  <script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
  </script>

 <?php require 'footer.php';?>

