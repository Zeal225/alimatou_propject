<?php
    ob_start();
include 'header.php'
?>
<?php
if(isset($_POST['add'])){
    $serveur='localhost';
    $db='restaurant';
    $utilisateur='root';
    $mot_passe='root';
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
    $adresse_livraison_client=$_POST['adresse_livraison_client'];
    $contact=$_POST['contact'];

    $pass_hache= password_hash($_POST['mot_de_passe_client'], PASSWORD_DEFAULT);
    //requete mysql pour insertion des donnees
    //try {
        $req=$connexion->prepare("INSERT INTO client(nom_client,prenoms_client,email_client,mot_de_passe_client,adresse_livraison_client, contact)VALUES(:nom_client,:prenoms_client,:email_client,:mot_de_passe_client,:adresse_livraison_client, :contact)");
        $req->execute(array(
            'nom_client'=>$nom_client,
            'prenoms_client'=>$prenoms_client,
            'email_client'=>$email_client,
            'mot_de_passe_client'=>$pass_hache,
            'adresse_livraison_client'=>$adresse_livraison_client,
            'contact'=>$contact,
        ));

    $user = $connexion->prepare('SELECT id_client FROM client WHERE email_client = :email_client');
    $user->execute(array(
        "email_client" => $_POST['email_client']));
    $resultat = $user->fetch();
        session_start();
        $_SESSION["auth"] = "YES";
        $_SESSION["auth_id"] = $resultat["id_client"];
        header("Location: checkout.php");
    exit();
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
<form action="inscription.php" class="billing-form" method="post">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-xl-6 ftco-animate">
			
				<h3 class="mb-4 billing-heading">INSCRIVEZ-VOUS</h3>
	          	<div class="row align-items-end">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="nom_client" id="nom_client" class="form-control" placeholder="">
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="last_name">Pr&eacute;nom(s)</label>
                    <input type="text" name="prenoms_client" id="prenoms_client" class="form-control" placeholder="">
                    </div>
                  </div>
                <div class="col-md-12">
	          			<div class="form-group">
	          				<label for="emailaddress">Email</label>
	          				<input type="email" name="email_client" id="email_client" class="form-control" placeholder="">
	                	</div>
                	</div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="">
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
                    <input type="password" name="conf_mot_de_passe_client" id="conf_mot_de_passe_client" class="form-control" placeholder="">
                    </div>
                  </div>
                    
                    <div class="w-100"></div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="adresse_livraison_client">Adresse de livraison</label>
                            <input type="text" name="adresse_livraison_client" id="adresse_livraison_client" class="form-control" placeholder="">
                        </div>
                    </div>
		            <div class="col-md-12">
		            	<div class="form-group">
                            <input type="submit" value="Valider l'inscription" class="btn btn-primary py-3 px-4" name="add">
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




