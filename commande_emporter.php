<?php
 require 'header.php';
?>

<?php

if(isset($_POST['add']))
{
       include('connexion.php');
      //Insérer des données $connexion->exec(requete Insert etc);
      //recuperer les valeurs
      $date_cmd=$_POST["date_cmd"];
      $heure_cmd=$_POST["heure_cmd"];
	  $adress_liv_cmd=$_POST["adress_liv_cmd"];
     
      
     //requete mysql pour insertion des donnees
     $inserer="INSERT INTO commande(date_cmd,heure_cmd,adress_liv_cmd) VALUES  
	  ('$date_cmd','$heure_cmd','$adress_liv_cmd')";
    $inserer=$connexion->exec($inserer);
  if ($inserer)
	  echo '';
  else{
	echo'';
   };
}

?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/vente_a_emporter.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span> <i><font color="orange">Passez vos commandes et r&eacute;cup&eacute;r&eacute; les en toute s&eacute;curit&eacute;</span></font></i></p>
            <h1 class="mb-0 bread"><font color="orange">Emportez vos commandes</font></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
              <form action="#" class="billing-form" method="post">
                  <h3 class="mb-4 billing-heading">Commandes &agrave; emporter</h3>
	          	<div class="row align-items-end">
                    <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Veuillez choisir l'un de nos restaurants</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="adress_liv_cmd" id="adress_liv_cmd" class="form-control">
		                  	<option>RIFAT MARCORY (NON LOIN HOTEL KONANKRO)</option>
		                    <option>RIFAT COCODY/RIVIERA2 (NON LOIN DE LA SGBCI)</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
	          		<div class="col-md-6">
                        <div class="form-group">
                            <label for="date_cmd">Date cueillete</label>
                          <input type="date" name="date_cmd" id="date_cmd" class="form-control" placeholder="">
                        </div>
	                 </div>
	              <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Heure cueillette</label>
                          <input type="time" name="heure_cmd" id="heure_cmd" class="form-control" placeholder="">
                        </div>
                    </div>
	            </div>
          </div>


            <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Burgers & Tacos</a></li>
    					<li><a href="#">Pizzas</a></li>
    					<li><a href="#">Ice Cream</a></li>
    					<li><a href="#">Drinks</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
    	<?php $products = $DB->query('SELECT * FROM products'); ?>
    	
    	<?php foreach ($products as $product): ?>
    	<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="product">
    					<a href="#" class="img-prod">
    <img class="img-fluid" src="img/<?= $product ->id; ?>.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3> <?= $product->name; ?> </h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span>
		    							<span class="price-sale"><?= number_format($product->price,2,',',' ');?></span></p>
		    					</div>

	    					</div>

	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>

	    							<a href="addpanier.php?id=<?=$product->id; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1 addpanier" >
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center "> 
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>

    							</div>

    						</div>

    					</div>

    				</div>
    	

    			</div>
    			
    				<?php endforeach ?>	
    			</div>
   
   
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
    <center>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	                <div class="cart-total mb-3">
              <h3>Cart Totals</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span>$20.60</span>
              </p>
              <p class="d-flex">
                <span>Delivery</span>
                <span>$0.00</span>
              </p>
              <p class="d-flex">
                <span>Discount</span>
                <span>$3.00</span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                  <span><?= number_format($panier->total(),2,',',' ' ); ?> FCFA</span>
              </p>
            </div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
								<p><a href="#"><input type="submit" value="Place an order" class="btn btn-primary py-3 px-4" name="add"></a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
          </form><!-- END -->
   </center>

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
    
 <?php
 require 'footer.php';
?>
