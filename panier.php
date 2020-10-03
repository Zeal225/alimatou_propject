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
            <h1 class="mb-0 bread">Mon panier</h1>
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
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Produits</th>
                    <th>Prix</th>
                    <th>Quantit&eacute;s</th>
                    <th>Total</th>
                  </tr>
                </thead>




   <?php  
   $ids = array_keys($_SESSION['panier']);
if(empty($ids)){
  $products=array();
}else{
$products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
}

foreach($products as $product):

?>


                <tbody>
                  <tr class="text-center">
                    <td class="product-remove"><a href="panier.php?delPanier=<?= $product->id; ?>" class="btn btn-primary btn-sm"><span class="ion-ios-close"></span></a></td>
                    
                    <td class="image-prod"> <img src="admin1/assets/images/<?php echo $product->images; ?>" class="img"></td>
                    
                    <td class="product-name">
                      <h3><?= $product->name;?></h3>
                      <p><?= $product->description;?></p>
                    </td>
                    
                    <td class="price"><?=number_format($product->prix-($product->prix*$product->remise)/100,2,',',' ');echo" FCFA";?></td>
                    
                    <td class="quantity">
                      <div class="input-group mb-3">
                        <span class="input-group-btn mr-2">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                     <i class="ion-ios-remove"></i>
                    </button>
                  </span>
                 
                        <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $_SESSION['panier'][$product->id]; ?>" min="1" max="100">
                
                          <span class="input-group-btn ml-2">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                       <i class="ion-ios-add"></i>
                   </button>
                </span>
                      </div>
                    </td>
                    
                    <td class="total"><?= number_format(($product->prix-($product->prix*$product->remise)/100)*$_SESSION['panier'][$product->id],2,',',' ');?> FCFA  </td>

                     <?php endforeach;?>

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
          
            <p>
                <?php
                session_start();
                $ids = array_keys($_SESSION['panier']);
                if (empty($ids)):
                ?>
                <h2>Votre panier est vide</h2>
                <?php else: ?>
                    <a href="checkout.php" class="btn btn-primary py-3 px-4">Proc&eacute;der au paiement</a>
                <?php endif; ?>
            </p>
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
            <div class="">
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

