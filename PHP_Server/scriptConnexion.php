<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projetweb','root','');

    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);

    // Requête préparée pour empêcher les injections SQL
    $requete = $bdd->prepare("SELECT * FROM personne WHERE Adresse_Mail = ? AND Mot_de_passe = ?");
    $requete->execute(array($mailconnect, $mdpconnect));
    $userexist = $requete->rowCount();
    if($userexist == 1)
    {
        $userinfo = $requete->fetch();
        $_SESSION['id'] = $userinfo['ID'];
        $_SESSION['Prenom'] = $userinfo['Prenom'];
        $_SESSION['Adresse_Mail'] = $userinfo['Adresse_Mail'];
        $_SESSION['avatar'] = $userinfo['avatar'];
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    else
    {
        header("Location: connexion.php");
    }
    $requete->closeCursor();
?>

