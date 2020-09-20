<?php
require '_header.php';
if(isset($_GET['id'])){
  $product = $DB->query ('SELECT id FROM produit WHERE id=:id', array('id' => $_GET['id']));
  if(empty($product )){
	die("Ce produit n'existe pas");
}
$panier->add($product[0]->id);
die('Le produit a bien &eacute;&eacute; ajout&eacute; au panier <a href="javascript:history.back()">retourner sur le catalogue</a>');
}else{
	die("Vous n'avez pas s&eacute;lectionn&eacute; de produit &aacute; ajouter au panier");
}







