<?php
require 'db.class.php';
require 'dbConfig.php';
$DB = new DB();
?><!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <title>BOUTIQUE ADMIN</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css?1555555" rel="stylesheet">


  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

  <!-- Cookie CSS -->
  <link href="cookiealert.css" rel="stylesheet">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <div class="list-group" id="outils2">
         <a id="panieto" class="btn btn-primary" href="boutique.php" role="button">Revenir au fil d'actualité des evenements</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="text-center">
        <h1 id="admintik"> EVENTDMIN ! </h1>
        <hr id="trait" style="height: 3px; color: #000000; background-color: #000000; width: 80%; border: none;">
        <h2 id="deleteprod"> Evenements visibles : </h2>
        </div>
        <div class="row">

          <?php $evenements = $DB->query('SELECT * FROM evenements WHERE valide=1'); ?>
          <?php if(is_array($evenements)){foreach ( $evenements as $evenement ){ ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" id="imaguss" src="/Uploads/<?= $evenement->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $evenement->Nom; ?></a>
                </h4>
                <h5><?= number_format($evenement->Prix,2,'.',' '); ?>€</h5>
                <p class="card-text"><?= $evenement->Description; ?></p>
              </div>
              <div class="card-footer text-center" id="categoriz">
                <p class="card-text" ><?= $evenement->Date; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn btn-primary" href="devalider.php?ID=<?= $evenement->ID; ?>" role="button">Masquer l'evenement</a>
              </p>
              <p class="addbutton">
                <a id="grosbouton2" class="btn btn-primary" href="supprimerEvent.php?ID=<?= $evenement->ID; ?>" role="button">Supprimer l'evenement</a>
              </p>
            </div>
          </div>

        <?php } }?> 

        </div>

        <hr id="trait" style="height: 2px; color: #000000; background-color: #000000; width: 80%; border: none;">
        <h2 id="deleteprod" class="text-center"> Evenements masqués : </h2>

        <div class="row">

          <?php $evenements = $DB->query('SELECT * FROM evenements WHERE valide=0'); ?>
          <?php if(is_array($evenements)){foreach ( $evenements as $evenement ){ ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" id="imaguss" src="/Uploads/<?= $evenement->file_name; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $evenement->Nom; ?></a>
                </h4>
                <h5><?= number_format($evenement->Prix,2,'.',' '); ?>€</h5>
                <p class="card-text"><?= $evenement->Description; ?></p>
              </div>
              <div class="card-footer text-center" id="categoriz">
                <p class="card-text" ><?= $evenement->Date; ?></p>
              </div>
              <p class="addbutton">
                <a id="grosbouton2" class="btn btn-primary" href="revalider.php?ID=<?= $evenement->ID; ?>" role="button">Demasquer l'evenement</a>
              </p>
              <p class="addbutton">
                <a id="grosbouton2" class="btn btn-primary" href="supprimerEvent.php?ID=<?= $evenement->ID; ?>" role="button">Supprimer l'evenement</a>
              </p>
            </div>
          </div>

        <?php } }?> 

        </div>
        <div class="text-center">
        <hr id="trait" style="height: 3px; color: #000000; background-color: #000000; width: 80%; border: none;">
        <h2 id="ajouterproduitsamer">Ajouter un evenement :</h2>
        </div>

        <div class="container">   
            <section>               
                <div id="container" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <div id="wrapper">

                        <div id="ajouterProduit" class="animate form">
                          <form enctype="multipart/form-data" method="POST" action="scriptAjoutProduit.php" >
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nom de l'evenement :</label>
                              <input type="text" name="Nom" required="required" class="form-control" placeholder="exemple : LAN">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Description de l'evenement :</label>
                              <textarea class="form-control" required="required" name="Description" rows="3" placeholder="Pour un evenement mensuel ecrivez ici la date recurente de l'evenement. Exemple : Le premier jeudi du mois."></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Date de l'evenement :</label>
                              <input type="date" name="Date" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Prix d'entree / de participation :</label>
                              <input type="text" name="Prix" required="required" class="form-control" placeholder="exemple : 49.99">
                            </div>
                           <div class="form-group">
                              <div class="md-form mb-0">
                                Image de l'evenement :
                                <input id="imagito" type="file" name="file" required="required" class="form-control">
                              </div>
                            </div>
                            <div>
                              <label for="inputState">Recurence :</label>
                              <select id="inputState" name="Mensuel" required="required" class="form-control">
                              <option value="Evenement ponctuel">Evenement ponctuel</option>
                              <option value="Evenement mensuel">Evenement mensuel</option>
                            </select>
                            </div>
                              <p class="addbutton">
                                <button id="grosbouton" type="submit" name="submit" class="btn btn-primary">Ajouter l'evenement</button>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>

<!-- Include cookiealert script -->
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

</body>

</html>