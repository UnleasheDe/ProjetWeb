<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projetweb','root','');

if($_SESSION['id'] > 0)
{
    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM personne WHERE ID = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/profil.css">
    <title>BDE</title>
</head>

<body>
<?php include("header.php"); ?>

    <div class="container-fluid border" style="background-color: #F8F9FA; margin-top: 15px; padding-bottom: 1.5rem; border-radius: 5px">
    <?php
    if(isset($_SESSION['id']) AND $_SESSION['id'] == $userinfo['ID'])
    { 
    ?>
    <h2 class="h2-responsive font-weight-bold text-left my-4">Votre profil :</h2>

    <?php if(!empty($userinfo['avatar']))
    {
        ?>  
            <div class="float-md-right float-sm-left" style="margin: 0px 0px 15px 15px">
            <img src="personne/avatars/<?php echo $userinfo['avatar']; ?>" style="max-width: 150px; height: auto">
            </div>
        <?php
    }
    ?>
    <fieldset disabled>
    <div class="form-group">
        <input type="text" id="disabledTextInput" class="form-control col-md-12" placeholder=" Nom : <?php echo $userinfo['Nom']?>">
        <input type="text" style="margin-top: 1.5rem" id="disabledTextInput" class="form-control col-md-12" placeholder=" Prénom : <?php echo $userinfo['Prenom']?>">
        <input type="text" style="margin-top: 1.5rem" id="disabledTextInput" class="form-control col-md-12" placeholder=" Campus : <?php echo $userinfo['Campus']?>">
        <input type="text" style="margin-top: 1.5rem" id="disabledTextInput" class="form-control col-md-12" placeholder=" Adresse-mail : <?php echo $userinfo['Adresse_Mail']?>">
    </div>
    </fieldset>
    <div class="content-item dropdown" style="margin-top: 1.5rem">
        <a class="btn dropdown-toggle" style="background-color: #6684BD; color: #F8F9FA; cursor: pointer" id="contentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
        <div class="dropdown-menu" style="background-color: #6684BD; color: #F8F9FA" aria-labelledby="contentDropdown">
          <a class="dropdown-item" style="color: #F8F9FA" href="maj.php">Mettre à jour mon profil</a>
          <a class="dropdown-item" style="color: #F8F9FA" href="deconnexion.php">Se déconnecter</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color: #F8F9FA" href="panier.php">Mon panier<i class="fas fa-shopping-cart"></i></a>
        </div>
      </div>
    </div>

    <?php include("footer.php"); ?>

      
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    }
    ?>
</body>

</html>
<?php
}
?>