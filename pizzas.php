<?php require 'header.php';?>



 <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">R&eacute;galez vous avec nos</span>
            <h2 class="mb-4">PIZZAS</h2>
            <p>Slogan du restaurant
            </p>
          </div>
        </div>   	
    	</div>
    	<div class="container">
    		<div class="row">
    			
    	<?php 	$products = $DB->query('SELECT * FROM products WHERE name like "%PIZZA%"'); ?>
    	
    	<?php foreach ($products as $product): ?>
    	<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="product">
    					<a href="#" class="img-prod">
    <img class="img-fluid" src="img/<?= $product ->id; ?>.jpg" alt="Colorlib Template">
    						<span class="status"><?php echo"-"; ?><?= number_format($product->remise);echo" %";?></span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3> <?= $product->name; ?> </h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"><?= number_format($product->prix,2,',',' ');echo" FCFA";?></span>
		    							<span class="price-sale"><?=number_format($product->prix-($product->prix*$product->remise)/100,2,',',' ');echo" FCFA";?></span></p>
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
 
<?php require 'footer.php';?>