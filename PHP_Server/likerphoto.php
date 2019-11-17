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

$ID_Photo = $_GET['ID_Photo'];
$ID_Event = $_GET['ID_Event'];

$requete = $db->prepare("UPDATE photos SET Likes = Likes+1 WHERE ID=$ID_Photo");

$requete->execute();
$requete->closeCursor();
header("location:photos.php?ID_Event=$ID_Event");
exit();

?>