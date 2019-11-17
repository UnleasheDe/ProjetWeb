<?php
require 'db.class.php';
$DB = new DB();
?>

<?php
session_start();
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
              <h2 class="h2-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Photos souvenir</h2>
        </div>
        </div>

    <div class="col-lg-4 mx-auto" id="outils">

        <div class="list-group">
         <a id="panieto" class="btn" href="evenements.php" role="button" style="margin-bottom: 24px">Revenir aux évènements</a>
        </div>

      </div>

      <div class="col-lg-12">

        <div class="row">
          <?php $idid = $_GET['ID_Event']; ?>
          <?php $products = $DB->query("SELECT * FROM photos WHERE ID_Event=$idid"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <img class="card-img-top" id="imaguz" src="/ProjetWeb/Uploads/<?= $product->file_name; ?>" alt=""></a>
              <div class="card-footer text-center" id="ajouteraupanier">
                <p class="card-text" ><?= $product->Likes; ?> likes</p>
                <a class="add addPanier" href="likerphoto.php?ID_Photo=<?= $product->ID; ?>&ID_Event=<?= $idid;?>">Liker la photo</a>
                <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
                <a href="/ProjetWeb/Uploads2/<?= $product->file_name; ?>" download="<?= $product->file_name; ?>">Télécharger l'image</a>
                <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">  
                <form action="postercommentaire.php?ID_Photo=<?= $product->ID; ?>" method="POST" enctype="multipart/form-data">
                  Poster un commentaire :
                  <input type="text" name="Commentaire">
                  <input class="btn" type="submit" name="submit" value="Poster" role="button" style="background-color: #6684BD; color: #F8F9FA; margin: 10px 0px 10px 0px">
                </form>
                <div class="text-center" id="ajouteraupanier">
                <a class="add addPanier" href="commentaires.php?ID_Photo=<?= $product->ID; ?>">Voir les commentaires</a>
              </div>
              </div>
            </div>
          </div>
        <?php } }?>          
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