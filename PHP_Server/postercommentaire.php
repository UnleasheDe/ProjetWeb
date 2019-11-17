<?php
try
      {
       $db = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    catch(Exception $e)
     {
      die('Erreur : '.$e->getMessage());
     }

$Commentaire = htmlspecialchars($_POST['Commentaire']);
$ID_Photo = $_GET['ID_Photo'];

$requete = $db->prepare("INSERT INTO commentaires (ID_Photo, Commentaire, Date_commentaire) VALUES ($ID_Photo, :Commentaire, NOW())");

$requete->bindValue(':Commentaire', $Commentaire, PDO::PARAM_STR);
$requete->execute();
$requete->closeCursor();
header("location:commentaires.php?ID_Photo=$ID_Photo");
exit();

?>