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
    <title>BDE</title>
</head>

<body>

    

    <?php include("header.php"); ?>
    <div class="container">   
            
            <section>               
                <div id="container" >
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">

            <div class="col-md-12 mb-md-0 mb-5">
						<div id="login" class="animate form">
                            <form method="POST" action="scriptInscription.php" autocomplete="on">
                                <h2 class="h2-responsive font-weight-bold text-center my-4">Inscription</h2>
                                <div class="mx-auto col-md-6">
                                <div class="md-form mb-0">
                                    <label for="NomDeFam" class="name" data-icon="N" >Nom : </label>
                                    <input id="NomDeFam" name="Nom" required="required" type="text" placeholder="Nom"  class="form-control">
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                    <label for="PrenomDePers" class="Prename" data-icon="P" >Prénom : </label>
                                    <input id="PrenomDePers" name="Prenom" required="required" type="text" placeholder="Prénom" class="form-control">
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                <label for="ElCampuso" class="Campuso" >Campus : </label>
                                    <select id="ElCampuso" name="Campus" required="required" placeholder="Campus" class="form-control">
                                        <option value="Aix-en-Provence">Aix-en-Provence</option>
                                        <option value="Angoulême">Angoulême</option>
                                        <option value="Arras">Arras</option>
                                        <option value="Bordeaux">Bordeaux</option>
                                        <option value="Brest">Brest</option>
                                        <option value="Caen">Caen</option>
                                        <option value="Châteauroux">Châteauroux</option>
                                        <option value="Dijon">Dijon</option>
                                        <option value="Douala">Douala</option>
                                        <option value="Grenoble">Grenoble</option>
                                        <option value="La Rochelle">La Rochelle</option>
                                        <option value="Le Mans">Le Mans</option>
                                        <option value="Lille">Lille</option>
                                        <option value="Lyon">Lyon</option>
                                        <option value="Montpellier">Montpellier</option>
                                        <option value="Nancy">Nancy</option>
                                        <option value="Nantes">Nantes</option>
                                        <option value="Nice">Nice</option>
                                        <option value="Orléans">Orléans</option>
                                        <option value="Paris Nanterre">Paris Nanterre</option>
                                        <option value="Pau">Pau</option>
                                        <option value="Reims">Reims</option>
                                        <option value="Rouen">Rouen</option>
                                        <option value="Saint-Nazaire">Saint-Nazaire</option>
                                        <option value="Strasbourg">Strasbourg</option>
                                        <option value="Toulouse">Toulouse</option>
                                    </select>
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                    <label for="mail" class="" data-icon="@" > Adresse E-Mail </label>
                                    <input id="mail" name="Adresse_Mail" required="required" type="email" placeholder="Adresse E-Mail" class="form-control">
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                    <label for="mdp" class="youpasswd" data-icon="M"> Mot de passe : </label>
                                    <input id="mdp" name="Mot_de_passe" required="required" type="password" placeholder="Mot de passe" class="form-control"> 
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                    <label for="mdp2" class="youpasswd"> Confirmation du mot de passe : </label>
                                    <input id="mdp2" name="Mot_de_passe2" required="required" type="password" placeholder="Confirmation du mot de passe" class="form-control"> 
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                <input type="checkbox" name="choix[]" required> Accepter les <a href="assets/Mentions_Legales.pdf" style="color: #6684BD">Mentions légales</a> <br>
                                <div class="text-center text-md-center">
                                </div>
                                </div>
                                <div class="text-center text-md-center">
                                <div class="register button">
                                <input class="btn" style="background-color: #6684BD; color: #F8F9FA; margin-top: 20px" type="submit" value="S'inscrire">
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center text-md-center" style="margin-top: 10px">
                        <a href="connexion.php" style="color: #6684BD">Déjà inscrit ? Connectez vous !</a>         
                    </div>            
                    </div>
                </div>  
            </section>
        </div>
    <?php include("footer.php"); ?>

      
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>