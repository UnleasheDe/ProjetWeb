<?php
session_start()
?>

<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);
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

    <div class="row">

      <div class="col-lg-4 mx-auto">

        <h2 class="h1-responsive font-weight-bold text-center my-4" style="margin-left: 0px">Boutique Admin</h2>
        <div class="list-group">
         <a id="panieto" class="btn" href="boutique.php" role="button">Revenir à la boutique</a>
        </div> 

      </div>

      <div class="col-lg-12">
        <div class="text-center">
        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4">Supprimer un produit</h3>
        </div>
        <div class="row">

          <?php $products = $DB->query('SELECT * FROM products'); ?>
          <?php if(is_array($products)){foreach ( $products as $product ){ ?>

          <div class="col-lg-2 col-md-2 mb-4">
            <div class="card h-100">
            <img class="card-img text-center" id="imagus" src="<?= $product->Image; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="text-center">
                  <a href="#"  style="color: #6684BD"><?= $product->Nom; ?></a>
                </h4>
                <h5 class= "text-center"><?= number_format($product->Prix,2,'.',' '); ?>€</h5>
                <p class="text-center"><?= $product->Description; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn" href="supprimerBoutique.php?ID=<?= $product->ID; ?>" role="button">Supprimer l'article</a>
              </p>
            </div>
          </div>

        <?php } }?> 

        </div>
        <div class="text-center">
        <hr class="rgba-white-light" style="margin: 10px 15% 10px 15%;">
        <h3 class="h3-responsive font-weight-bold text-center my-4">Ajouter un produit</h3>
        </div>

        <div class="container">   
            <section>               
                <div id="container" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <div id="wrapper">

                        <div id="ajouterProduit" class="animate form">
                          <form method="POST" action="scriptAjoutProduit.php">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nom du produit :</label>
                              <input type="text" name="Nom" required="required" class="form-control" placeholder="exemple : Bonnet">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Catégorie :</label>
                              <input type="text" name="Categorie" required="required" class="form-control" placeholder="exemple : Vêtements">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Prix :</label>
                              <input type="text" name="Prix" required="required" class="form-control" placeholder="exemple : 249.99">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Description du produit :</label>
                              <textarea class="form-control" required="required" name="Description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">URL de l'image du produit :</label>
                              <textarea class="form-control" required="required" name="Image" rows="1" placeholder="exemple : https://jardinage.lemonde.fr/images/dossiers/historique/tournesol-175148.jpg"></textarea>
                            </div>
                            <div class="col-lg-4 mx-auto">
                              <p class="addbutton">
                                <button id="grosbouton" type="submit" class="btn btn-primary">Ajouter l'article</button>
                              </p>
                            </form>
                        </div> 
                    </div>
                </div>  
            </section>
        </div>
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
