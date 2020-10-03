<?php
$serveur='localhost';
$db='restaurant';
$utilisateur='root';
$mot_passe='root';
try{

	$connexion=new PDO("mysql:host=$serveur;dbname=$db","$utilisateur","$mot_passe");
		echo'';
}catch(PDOException $event){
die('Attention Erreur:'.$event->getMessage());
}
?>