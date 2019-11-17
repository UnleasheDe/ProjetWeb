<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <title>BOUTIQUE</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="assets/shop-homepage.css" rel="stylesheet">


  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

  <!-- Cookie CSS -->
  <link href="cookiealert.css" rel="stylesheet">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3" id="outils">

        <div class="list-group">
         <a id="panieto" class="btn btn-primary" href="panié.php" role="button">Mon panier <i class="fas fa-shopping-cart"></i></a>
         <p></p>
         <a id="panieto" class="btn btn-primary" href="admin.php" role="button">Page ADMIN</a>
        </div>
        <div class="dropdown text-center">
          <button class="btn btn-secondary dropdown-toggle" id="filtrage" type="button" data-toggle="dropdown">Filtrer par ...</button>
          <div class="dropdown-menu" id="menu">
          <a class="dropdown-item" href="categorie.php">Catégorie</a>
          <a class="dropdown-item" href="croissant.php">Prix croissant</a>
          <a class="dropdown-item" href="decroissant.php">Prix décroissant</a>
        </div>
      </div>
      <form autocomplete="off" action="get_form.php">
        <div class="autocomplete" id="searchbar" style="width:100%;">
          <input id="myInput" type="text" name="myCountry" placeholder="Produit ...">
        </div>
        <a id="grosbouton3" class="btn btn-primary" href="categorie.php" role="button">Valider</a>
      </form>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        
        <div class="text-center">
        <h1 id="admintik"> Boutique du BDE</h1>
        </div>

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
        </div>

        <div class="row">
          <?php $products = $DB->query('SELECT * FROM products ORDER BY Categorie'); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" id="imagus" src="<?= $product->Image; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $product->Nom; ?></a>
                </h4>
                <h5><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="card-text"><?= $product->Description; ?></p>
              </div>
              <div class="card-footer text-center" id="categoriz">
                              <p class="card-text" >Catégorie : <?= $product->Categorie; ?></p>
              </div>
              <div class="card-footer text-center" id="ajouteraupanier">
                              <a class="add addPanier" href="addpanier.php?id=<?= $product->ID; ?>">Ajouter au panier</a>
              </div>
            </div>
          </div>

        <?php } }?>          

        </div>
      </div>
    </div>
  </div>

  <div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="https://www.cookiesandyou.com/about-cookies/" target="_blank">Learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I agree
    </button>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="main.js"></script>

    <script>var countries = [];
  <?php $products = $DB->query('SELECT * FROM products'); ?>
  <?php if(is_array($products)){foreach ( $products as $product ){ ?>
  countries.push('<?= $product->Nom; ?>');
  <?php } }?></script>

  <script src="autocomplete.js"></script>
  <script>autocomplete(document.getElementById("myInput"), countries);</script>

<!-- Include cookiealert script -->
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

</body>

</html>