<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" name="">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    
    <link href="assets/shop-homepage.css" rel="stylesheet">
    
    <title>BDE</title>
</head>

<body>
<script src="main.js"></script>

<script>var countries = [];
  <?php $products = $DB->query('SELECT * FROM products'); ?>
  <?php if(is_array($products)){foreach ( $products as $product ){ ?>
  countries.push('<?= $product->Nom; ?>');
  <?php } }?></script>

  <script src="autocomplete.js"></script>
  <script>autocomplete(document.getElementById("myInput"), countries);</script>
 

    <?php include("header.php"); ?>

    <div class="row">
      
    <div class="col-lg-12">
    <div class="text-center">
              <h2 class="h1-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Boutique</h2>
        </div>
        </div>

      <div class="col-lg-4 mx-auto" id="outils">

        <div class="list-group">
         <a id="panieto" class="btn" href="panié.php" role="button">Mon panier <i class="fas fa-shopping-cart"></i></a>
         <a id="panieto" class="btn" href="adminBoutique.php" role="button">Page ADMIN</a>
       
         </div>
        <div class="content-item dropdown text-center">
        <button class="btn dropdown-toggle" style="background-color: #6684BD; color: #F8F9FA; cursor: pointer" id="filtrage" role="button" data-toggle="dropdown">Filtrer par ...</button>
        <div class="dropdown-menu" style="background-color: #6684BD; color: #F8F9FA; width: 80%">
          <a class="dropdown-item" style="color: #F8F9FA" href="categorie.php">Catégorie</a>
          <a class="dropdown-item" style="color: #F8F9FA" href="deconnexion.php">Prix croissant</a>
          <a class="dropdown-item" style="color: #F8F9FA" href="panier.php">Prix décroissant</a>
        </div>
      </div>
      <form autocomplete="off" action="get_form.php">
        <div class="autocomplete" id="searchbar" style="width:100%;">
          <input class="form-control" id="myInput" type="text" name="myCountry" placeholder="Produit ...">
        </div>
        <div class="text-center">
          <a id="grosbouton3" class="btn" href="boutique.php" role="button">Valider</a>
          </div>
      </form>

      </div>


      <div class="col-lg-12">
      <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
              
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div id="carourou" class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <?php $products = $DB->query('SELECT * FROM products ORDER BY Ventes DESC LIMIT 1'); ?>
              <?php if(is_array($products)){foreach ( $products as $product ){ ?>
              <img class="d-block img-fluid" src="<?= $product->Image; ?>" alt="First slide">
              <?php } }?>
            </div>
            <div class="carousel-item">
              <?php $products = $DB->query('SELECT * FROM products ORDER BY Ventes DESC LIMIT 1, 1;'); ?>
              <?php if(is_array($products)){foreach ( $products as $product ){ ?>
              <img class="d-block img-fluid" src="<?= $product->Image; ?>" alt="Second slide">
              <?php } }?>
            </div>
            <div class="carousel-item">
              <?php $products = $DB->query('SELECT * FROM products ORDER BY Ventes DESC LIMIT 2, 1;'); ?>
              <?php if(is_array($products)){foreach ( $products as $product ){ ?>
              <img class="d-block img-fluid" src="<?= $product->Image; ?>" alt="Third slide">
              <?php } }?>
            </div>
          </div>  
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>	
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        </div>

        <div class="row">
          <?php $products = $DB->query('SELECT * FROM products'); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          <div class="col-lg-2 col-md-2 mb-4">
            <div class="card h-100">
              <img class="card-img text-center" id="imagus" src="<?= $product->Image; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#" style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <div class="text-center text-center" id="categoriz">
                <p class="text-center" ><?= $product->Categorie; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="addpanier.php?ID=<?= $product->ID; ?>" role="button">Ajouter au panier</a>
              </p>
            </div>
          </div>
        <?php } }?>          
        </div>
      </div>
    </div>
 </div>
    

    <?php include("footer.php"); ?>

      
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>
