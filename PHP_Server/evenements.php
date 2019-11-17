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
              <h2 class="h2-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Évènements</h2>
        </div>
        </div>

      <div class="col-lg-4 mx-auto" id="outils">

        <div class="list-group">
         <a id="panieto" class="btn" href="adminEvent.php" role="button">Page ADMIN</a>
        </div>

      </div>

      <div class="col-lg-12">

        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Évènements du mois</h3>

        <div class="row">
          <?php $products = $DB->query("SELECT * FROM evenements WHERE Date BETWEEN NOW() AND NOW()+INTERVAL 1 MONTH AND valide='1'"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

            <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <img class="card-img text-center" id="imagus" src="/ProjetWeb/Uploads/<?= $product->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#" style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <div class="text-center text-center" id="categoriz">
                <p class="text-center" ><?= $product->Date; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="inscriptionevent.php" role="button">S'inscrire</a>
              </p>
            </div>
          </div>
        <?php } }?>          
        </div>

        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Évènements à venir</h3>

          <div class="row">
          <?php $products = $DB->query("SELECT * FROM evenements WHERE Date > NOW()+INTERVAL 1 MONTH AND valide='1'"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          
            <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <img class="card-img text-center" id="imagus" src="/ProjetWeb/Uploads/<?= $product->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#" style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <div class="text-center text-center" id="categoriz">
                <p class="text-center" ><?= $product->Date; ?></p>
              </div>
              <fieldset disabled>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="inscriptionevent.php" role="button">Vous ne pouvez pas encore vous inscrire</a>
              </p>
              </fieldset>
            </div>
          </div>
        <?php } }?>          
        </div>

        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Évènements mensuels</h3>

        <div class="row">
          <?php $products = $DB->query("SELECT * FROM evenements WHERE valide='1' AND Mensuel='Evenement mensuel'"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          
            <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <img class="card-img text-center" id="imagus" src="/ProjetWeb/Uploads/<?= $product->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#" style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <div class="text-center text-center" id="categoriz">
                <p class="text-center" ><?= $product->Mensuel; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="inscriptionevent.php" role="button">S'inscrire</a>
              </p>
            </div>
          </div>
        <?php } }?>          
        </div>

        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Évènements passés</h3>

        <div class="row">
          <?php $products = $DB->query("SELECT * FROM evenements WHERE Date < NOW() AND Mensuel='Evenement ponctuel'"); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          
            <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <img class="card-img text-center" id="imagus" src="/ProjetWeb/Uploads/<?= $product->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#" style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <div class="text-center text-center" id="categoriz">
                <p class="text-center" ><?= $product->Mensuel; ?></p>
              </div>
              <div class="text-center text-center">
              <div class="mx-auto col-md-12" style="margin-top: 10px">
              <form action="posterphoto.php?ID_Event=<?= $product->ID;?>" method="POST" enctype="multipart/form-data">
                                <div class="md-form mb-0">
                                    <label for="posterphoto" class="posterphoto"> Sélectionner une photo à poster : </label>
                                    <input id="posterphoto" name="posterphoto" type="file" class="form-control"> 
                                    <input type="submit" name="submit" value="Upload" class="btn" style="background-color: #6684BD; color: #F8F9FA; margin: 10px 0px 10px 0px">
                                </div>
                                </div>
                </form>
                </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="photos.php?ID_Event=<?= $product->ID;?>" role="button">Voir les photos</a>
              </p>
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