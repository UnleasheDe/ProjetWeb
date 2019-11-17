<?php
require 'db.class.php';
$DB = new DB();
?><!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <title>BOUTIQUE</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/shop-homepage.css?1155455611641515119" rel="stylesheet">

  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3" id="outils">

        <div class="list-group">
         <a id="panieto" class="btn btn-primary" href="boutique.php" role="button">Revenir aux evenements</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
      <div class="text-center">
        <h1 id="admintik"> Commentaires de la photo</h1>
        </div>

        <div class="row">
          <?php $ididid = $_GET['ID_Photo']; ?>
          <?php $products = $DB->query("SELECT * FROM commentaires WHERE ID_Photo=$ididid"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Commentaire :</a>
                </h4>
                <p class="card-text"><?= $product->Commentaire; ?></p>
              </div>
              <div class="card-footer text-center" id="categoriz">
                <p class="card-text" ><?= $product->Date_commentaire; ?></p>
            </div>
          </div>
        </div>
        <?php } }?>          
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>

</body>

</html>