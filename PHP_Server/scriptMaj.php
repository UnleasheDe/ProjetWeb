<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');

$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Campus =  htmlspecialchars($_POST['Campus']);
$Adresse_Mail = htmlspecialchars($_POST['mailmaj']);
$Mot_de_passe = sha1($_POST['mdpmaj']);
$Mot_de_passe2 = sha1($_POST['mdpmaj2']);
$Mdp = $_POST['mdpmaj'];
$ID = $_SESSION['id'];

$Nomlength = strlen($Nom);
$Prenomlength = strlen($Prenom);
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("UPDATE personne SET Nom = :Nom , Prenom = :Prenom , Campus = :Campus , Adresse_Mail = :Adresse_Mail , Mot_de_passe = :Mot_de_passe  WHERE personne.ID = :ID");

if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z]{5,20}$/',$Mdp)) 
{
if($Nomlength <= 20)
{
    if($Prenomlength <= 20)
    {
        $reqmail = $bdd->prepare("SELECT * FROM personne WHERE Adresse_Mail = ?");
        $reqmail->execute(array($Adresse_Mail));
        $mailExist = $reqmail->rowCount();

        if($mailExist == 0 || $Adresse_Mail == $_SESSION['Adresse_Mail'])
        {
            if($Mot_de_passe == $Mot_de_passe2)
                {
            $requete->bindValue(':Nom', $Nom, PDO::PARAM_STR);
            $requete->bindValue(':Prenom', $Prenom, PDO::PARAM_STR);
            $requete->bindValue(':Campus', $Campus, PDO::PARAM_STR);
            $requete->bindValue(':Adresse_Mail', $Adresse_Mail, PDO::PARAM_STR);
            $requete->bindValue(':Mot_de_passe', $Mot_de_passe, PDO::PARAM_STR);
            $requete->bindValue(':ID', $ID, PDO::PARAM_STR);
            
            $requete->execute();
            header('Location: profil.php');
                }
                else
                {
                    $erreur = "Le mot de passe de confirmation doit être identique";
                }

        }
        else
        {
                $erreur = "Adresse mail déjà utilisée, recommencez";
        }
        
    }
    else
    {
        $erreur = "Votre prénom est trop long";
    }
}
else
{
    $erreur = "Votre nom est trop long";
}
}
else
{
    $erreur = "Votre mot de passe doit contenir au moins 5 caractères dont au moins 1 majuscule, 1 minuscule et 1 chiffre";
}

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
    $tailleMax = 2097152;
    $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax)
    {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionValides))
        {
            $chemin = "personne/avatars/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat)
            {
                $updateAvatar = $bdd->prepare('UPDATE personne SET avatar = :avatar WHERE ID = :ID');
                $updateAvatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload, 'ID' =>$_SESSION['id']));
            }
            else
            {
                $erreur = "Erreur durant l'importation de votre photo de profil";
            }
        }
        else
        {
            $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    }
    else
    {
        $erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}

echo $erreur;
$requete->closeCursor();
exit();
?>
