<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);

$json = array('error' => true);

if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_GET['id']));
	if(empty($product)){
	die("Ce produit n'existe pas, ta douille n'a pas fonctionné hehe O_o");
	}
	$panier->add($product[0]->id);
	$json['error'] = false;
	$json['message'] = 'Le produit a bien été ajouté bg !';
}else{
	$json['message'] = "Ok y'a eu un probleme quelque part mais tkt ça va se réparer soon";
}
echo json_encode($json);
?>