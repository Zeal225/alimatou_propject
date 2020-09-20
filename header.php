<?php
require '_header.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chez RIFAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 225 23004500</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">chezrifat@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">OUVERT 7J/7 DE 8H A 00H</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">CHEZ RIFAT</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Accueil</a></li>
	          <li class="nav-item dropdown">
	          	<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cat&eacute;gories</a>
	          	<div class="dropdown-menu" aria-labelledby="dropdown04">
	          		<a class="dropdown-item" href="burger&tacos.php">Burgers & Tacos</a>
              <a class="dropdown-item" href="pizzas.php">Pizzas</a>
              <a class="dropdown-item" href="cocktails.php">Cocktails</a>
              <a class="dropdown-item" href="ice_cream.php">Ice cream</a>
                </div>
             </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Commandes</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="commande_emporter.php">Pour emporter</a>
                <a class="dropdown-item" href="commande_livraison.php">Pour livraison</a>
              </div>
            </li>
             <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Menu</a>
                <a class="dropdown-item" href="product-single.php">D&eacute;tail produit</a>
                <a class="dropdown-item" href="cart.php">Panier</a>
                <a class="dropdown-item" href="checkout.php">Paiement</a>
              </div>
            </li>-->
	          <li class="nav-item"><a href="about.php" class="nav-link">&Agrave; propos</a></li>
	         <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>-->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="panier.php" class="nav-link"><span class="icon-shopping_cart"><span id="total"><?=number_format($panier->total(),2,',',' '); ?> FCFA&nbsp;</span></span>[<span id="count"><?= $panier->count();?></span>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->