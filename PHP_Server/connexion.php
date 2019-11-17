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
                            <form method="POST" action="scriptConnexion.php" autocomplete="on">
                                <h2 class="h2-responsive font-weight-bold text-center my-4">Connexion</h2>
                                <div class="mx-auto col-md-6">
                                <div class="md-form mb-0">
                                    <label for="mail" class="" data-icon="@" > Adresse E-Mail </label>
                                    <input id="mail" name="mailconnect" required="required" type="email" placeholder="Adresse E-Mail" class="form-control">
                                </div>
                                </div>
                                <div class="mx-auto col-md-6" style="margin-top: 10px">
                                <div class="md-form mb-0">
                                    <label for="mdp" class="youpasswd" data-icon="M"> Mot de passe : </label>
                                    <input id="mdp" name="mdpconnect" required="required" type="password" placeholder="Mot de passe" class="form-control"> 
                                </div>
                                </div>
                                <div class="text-center text-md-center">
                                <div class="login button">
                                <input class="btn" style="background-color: #6684BD; color: #F8F9FA; margin-top: 20px" type="submit" value="Connexion">
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center text-md-center" style="margin-top: 10px">
                    <a href="inscription.php" style="color: #6684BD">Pas encore inscrit ? C'est par ici !</a>         
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