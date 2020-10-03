<?php require 'header.php';?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Produits</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">Tous</a></li>
    					<li><a href="burgers&tacos.php">Burgers & Tacos</a></li>
    					<li><a href="#">Pizzas</a></li>
    					<li><a href="#">Crèmes & Glaces</a></li>
    					<li><a href="#"><Boissons></Boissons></a></li>
    				</ul>
    			</div>
    		</div>
                <div class="container">
            <div class="row">
                
        <?php $products = $DB->query('SELECT * FROM products'); ?>
        
        <?php foreach ($products as $product): ?>
        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                        <a href="#" class="img-prod">
    <img class="img-fluid" src="admin1/assets/images/<?= $product ->images; ?>" alt="Colorlib Template">
                            <?php if ($product->remise > 0): ?>
                                <span class="status">
                                    <?php echo"-"; ?><?= number_format($product->remise);echo" %";?>
                                </span>
                            <?php endif; ?>
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
                                   <!-- <a href="#>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>-->

                                    <a href="addpanier.php?id=<?=$product->id; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1 addpanier" >
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <!--<a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>-->
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