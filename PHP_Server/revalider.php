<?php
try
      {
       $bdd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    catch(Exception $e)
     {
      die('Erreur : '.$e->getMessage());
     }

$requete = $bdd->prepare("UPDATE evenements SET valide = '1' WHERE ID=:ID LIMIT 1");

$requete->bindValue(':ID', $_GET['ID'], PDO::PARAM_INT);
            
$requete->execute();
header('Location: admin.php');
$requete->closeCursor();
exit();
?>
