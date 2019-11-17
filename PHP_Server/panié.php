<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);
?>
<?php
if(isset($_GET['del'])){
	$panier->del($_GET['del']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    
    <link href="assets/shop-homepage.css" rel="stylesheet">
    
    <title>BDE</title>
</head>

<body>

    

	<?php include("header.php"); ?>
	
	<form method="post" action="panié.php">

	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Produit</th>
							<th style="width:10%">Prix</th>
							<th style="width:8%">Quantité</th>
							<th style="width:22%" class="text-center">Sous-total</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ids = array_keys($_SESSION['panier']);
						if(empty($ids)){
							$products = array();
						}else{
						$products=$DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
						}
						if(is_array($products)){foreach ( $products as $product ){
						?>
						<tr>
							<td data-th="Produit">
									<div class="col-sm-2 hidden-xs"><img src="<?= $product->Image; ?>" alt="..." id="imaguss"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?= $product->Nom?></h4>
										<p><?= $product->Description?></p>
								</div>
							</td>
							<td data-th="Price"><?= number_format($product->Prix,2,'.',' '); ?>€</td>
							<td data-th="quantity" class="text-center"><?= $_SESSION['panier'][$product->ID]; ?></td>
							<td data-th="Subtotal" class="text-center"><?= number_format(($product->Prix)*($_SESSION['panier'][$product->ID]),2,'.',' '); ?>€</td>
							<td data-th="" class="actions" >
								<button onclick="location.href='panié.php?del=<?= $product->ID;?>';"class="btn btn-danger btn-sm" id="del">X</button>
							</td>	
						</tr>
						<?php } }?>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong></strong></td>
						</tr>
						<tr>
							<td><a href="boutique.php" class="btn" style="background-color: #6684BD; color: #F8F9FA;" id="bouton1"><i class="fa fa-angle-left"></i> Continuer mes achats</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong><?= number_format($panier->total(),2,'.',' ');?>€</strong></td>
							<td><a href="#" class="btn" style="background-color: #6684BD; color: #F8F9FA;" id="bouton2">Paiement<i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
		
<?php include("footer.php"); ?>

      
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>