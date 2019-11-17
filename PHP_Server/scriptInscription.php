<?php
$bdd = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');

$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Campus =  htmlspecialchars($_POST['Campus']);
$Adresse_Mail = htmlspecialchars($_POST['Adresse_Mail']);
$Mot_de_passe = sha1($_POST['Mot_de_passe']);
$Mot_de_passe2 = sha1($_POST['Mot_de_passe2']);
$Mdp = $_POST['Mot_de_passe'];
$avatar = "Default.png";

$Nomlength = strlen($Nom);
$Prenomlength = strlen($Prenom);
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("INSERT INTO personne (Nom, Prenom, Campus, Adresse_Mail, Mot_de_passe, avatar, ID_Role) VALUES(:Nom, :Prenom, :Campus,  :Adresse_Mail, :Mot_de_passe, :avatar, 3)");
if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z]{5,20}$/',$Mdp)) 
{
    if($Nomlength <= 20)
    {
        if($Prenomlength <= 20)
        {
            $reqmail = $bdd->prepare("SELECT * FROM personne WHERE Adresse_Mail = ?");
            $reqmail->execute(array($Adresse_Mail));
            $mailExist = $reqmail->rowCount();

          if($mailExist == 0)
            {


                if($Mot_de_passe == $Mot_de_passe2)
                {
                    $requete->bindValue(':Nom', $Nom, PDO::PARAM_STR);
                    $requete->bindValue(':Prenom', $Prenom, PDO::PARAM_STR);
                    $requete->bindValue(':Campus', $Campus, PDO::PARAM_STR);
                    $requete->bindValue(':Adresse_Mail', $Adresse_Mail, PDO::PARAM_STR);
                    $requete->bindValue(':Mot_de_passe', $Mot_de_passe, PDO::PARAM_STR);
                    $requete->bindValue(':avatar', $avatar, PDO::PARAM_STR);


                    $requete->execute();
                    header('Location: inscriptionreussie.php');
                }
                else
                {
                    $erreur = "Le mot de passe de confirmation doit être identique";
                }
            }
            else
            {
                $erreur = "Adresse mail déjà utilisée, recommencez l'inscription";
            }
        }
         else
        {
            $erreur = "Votre prénom est trop long, recommencez l'inscription.";
         }
    }
    else
    {
        $erreur = "Votre nom est trop long, recommencez votre inscription";
    }
}
else
{
    $erreur = "Votre mot de passe doit contenir au moins 5 caractères dont au moins 1 majuscule, 1 minuscule et 1 chiffre";
}
echo $erreur;
$requete->closeCursor();
exit();
?>
