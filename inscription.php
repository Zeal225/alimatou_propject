<?php require 'header.php';?>

<?php

if(isset($_POST['add'])){
$serveur='localhost';
$db='restaurant';
$utilisateur='root';
$mot_passe='';
try{
  $connexion=new PDO("mysql:host=$serveur;dbname=$db","$utilisateur","$mot_passe");
    echo'';
}
catch(PDOException $event){
die('Attention Erreur:'.$event->getMessage());
}
//Insérer des données $connexion->exec(requete Insert etc);
//recuperer les valeurs
$nom_client=$_POST['nom_client'];
$prenoms_client=$_POST['prenoms_client'];
$email_client=$_POST['email_client'];
$mot_de_passe_client=$_POST['mot_de_passe_client'];
$conf_mot_de_passe_client=$_POST['conf_mot_de_passe_client'];

$pass_hache=password_hash($_POST['mot_de_passe_client'], PASSWORD_DEFAULT);
//requete mysql pour insertion des donnees
$req=$connexion->prepare("INSERT INTO client(nom_client,prenoms_client,email_client,mot_de_passe_client,conf_mot_de_passe_client)VALUES(:nom_client,:prenoms_client,:email_client,:mot_de_passe_client,:conf_mot_de_passe_client)");
$req->execute(array(
'nom_client'=>$nom_client,
'prenoms_client'=>$prenoms_client,
'email_client'=>$email_client,
'mot_de_passe_client'=>$mot_de_passe_client,
'conf_mot_de_passe_client'=>$conf_mot_de_passe_client));
}
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Paiement</span></p>
            <h1 class="mb-0 bread">Paiement</h1>
          </div>
        </div>
      </div>
    </div>
<form action="#" class="billing-form" method="post">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-xl-6 ftco-animate">
			
				<h3 class="mb-4 billing-heading">INSCRIVEZ-VOUS</h3>
	          	<div class="row align-items-end">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="varchar" name="nom_client" id="nom_client" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="last_name">Pr&eacute;nom(s)</label>
                    <input type="varchar" name="prenoms_client" id="prenoms_client" class="form-control" placeholder="">
                    </div>
                  </div>
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label for="emailaddress">Email</label>
	          				<input type="varchar" name="email_client" id="email_client" class="form-control" placeholder="">
	                	</div>
                	</div>
                
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<label for="emailaddress">Password</label>
                    		<input type="Password" name="mot_de_passe_client" id="mot_de_passe_client" class="form-control" placeholder="">
	                    </div>
                    </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <label for="emailaddress">Confirmer password</label>
                    <input type="varchar" name="conf_mot_de_passe_client" id="conf_mot_de_passe_client" class="form-control" placeholder="">
                    </div>
                  </div>
                    
                    <div class="w-100"></div>
                    <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                		<h3 class="mb-4 billing-heading">D&Eacute;TAILS DE VOTRE LIVRAISON</h3>
	               				<input type="varchar" name="adresse_livraison_client" id="adresse_livraison_client" class="form-control" placeholder="Chercher par rue, quartier, ville etc.">
	                	</div>
		            </div>
		        </div>
			</div>
   				 
		        <div class="col-xl-6">
	          		<div class="row mt-5 pt-3">
	          		  	<div class="col-md-12 d-flex mb-5">
	          				<div class="cart-detail cart-total p-3 p-md-4">
	          					<font color="black" size="6">FACTURE</font>
										<?php  
   											$ids = array_keys($_SESSION['panier']);
  										    if(empty($ids)){
   												$products=array();
  											}
  											else{
   												$products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
											}
								foreach($products as $product):

										?>
 				<p class="d-flex total-price">
					<span>
						<?= $product->name;?> 
					</span>
					<span> </span>
					<span> X </span>
					<span>
 						<?= $_SESSION['panier'][$product->id]; ?>
					</span>
 					<span> <?= number_format(($product->prix-($product->prix*$product->remise)/100)*$_SESSION['panier'][$product->id],2,',',' ');?> 
					</span>FCFA
 					<span> </span>
 				</p>

								<?php endforeach;?>
				<hr> 
				<?php
            		  /*echo('<p class="d-flex">
            		    <span>LIVRAISON</span>
                		<span>');
               
                		/*if($panier->total()>10000){
                		echo number_format (0,2,',',' ');echo" FCFA";
                		}
                		else{
                		echo number_format (1000,2,',',' ');echo" FCFA";
                		}
              		*/
              

            		//  echo'</p>';
           				//echo'</span>';
           		?>
 				<?php
             		 /*echo'<p class="d-flex">
                		<span>REMISE</b></font></span>
                		<span>0.00 FCFA</span>
             		 </p> ';*/  
             		 //$AUJHSD45=1500;
                		//if (isset($_POST['appliquer'])) {
                  		# code...
                  	echo
                 		("	<form action='#' method='post' class='info'>
          						<p class='d-flex'>
                 				 	<input type='varchar' class='form-control text-left px-3' placeholder='Saisissez un coupon si vous en avez...' name='libelle_coupon'>
              						<input type='submit' class='' name='appliquer' value='VALIDER'>
        						 </p> 
              				 </form>
              			");
               
             
               
                ?>
                <hr>
             		<p class="d-flex total-price">
						<span>
							<font size="4" color="black">
								<b>TOTAL</b>
							</font>
						</span>

					<b>
             			<?php
               				/* if($panier->total()>10000){
                				echo number_format($panier->total(),2,',',' ' ); echo" FCFA";
              				}else{
                				echo number_format($panier->total()+1000,2,',',' ' ); echo" FCFA";
              				}*/
             			?>

             			<?php
                		/*if(isset($_POST['appliquer']) and $_POST['libelle_coupon']!='AUJHSD45' and ($panier->total()>10000)){
              			echo number_format($panier->total()+1000,2,',',' ' ); echo" FCFA";}
             			 else{
              			echo number_format($panier->total()+1000-$AUJHSD45,2,',',' ' ); echo" FCFA";
              			}*/
              			?>

              			<?php
							/*if(isset($_POST['appliquer'])){
                  			$serveur='localhost';
							$db='restaurant';
							$utilisateur='root';
							$mot_passe='';
							try{
  							$connexion=new PDO("mysql:host=$serveur;dbname=$db","$utilisateur","$mot_passe");
   						 	echo'';
							}catch(PDOException $event){
							die('Attention Erreur:'.$event->getMessage());
							}
  							$libelle_coupon=$_POST['libelle_coupon'];
   							$inserer=("INSERT INTO coupon(libelle_coupon)VALUES('$libelle_coupon')");
   							$inserer=$connexion->exec($inserer); }*/

							$RIFHSD45=1500;
							$RIFLOO18=2000;
							$RIFU2512=3000;
							$RIFK8652=5000;

                			if(isset($_POST['appliquer']) and $_POST['libelle_coupon']=='RIFHSD45')
                			{
              					echo number_format($panier->total()-$RIFHSD45,2,',',' ' ); echo" FCFA"; 
              				}
              				else if(isset($_POST['appliquer']) and $_POST['libelle_coupon']=='RIFLOO18')
              				{
              					echo number_format($panier->total()-$RIFLOO18,2,',',' ' ); echo" FCFA";
              				}
              				else if(isset($_POST['appliquer']) and $_POST['libelle_coupon']=='RIFU2512')
              				{
              					echo number_format($panier->total()-$RIFU2512,2,',',' ' ); echo" FCFA";
              				}
              				else if(isset($_POST['appliquer']) and $_POST['libelle_coupon']=='RIFK8652')
              				{
              					echo number_format($panier->total()-$RIFK8652,2,',',' ' ); echo" FCFA";
              				}
              				else
              				{
								echo number_format($panier->total(),2,',',' ' ); echo" FCFA";
              				}

              			?>
             				
             			<?php
             				if($panier->total()==0)
             				{ 
              					# code...
              					echo("<br/>Vous ne pouvez pas effectuer de paiement, veuillez ajouter un produit au panier.");
              				}
               			?>
           			</b>
					</p>
   							</div>
   						</div>
   					
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Moyen de Paiement </h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Orange money</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> MTN mobile money</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Flooz</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> J'ai lu et accept&eacute; les conditions de paiement</label>
											</div>
										</div>
									</div>
									<p><a href="#"><input type="submit" value="VALIDER COMMANDE" class="btn btn-primary py-3 px-4" name="add"></a></p>
					</div>
				</div>
				 </div>
   				 </div>
   				 
   				
				
				</div>
   			  </div>
   			</div>
	         <!-- END -->
    </section> <!-- .section -->
</form>
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




