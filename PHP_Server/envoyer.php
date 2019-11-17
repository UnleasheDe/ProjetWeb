<?php
$to       = 'theotime.gigleux@viacesi.fr';
$subject  = 'Test de l\'envoi d\'un message !';
$message  = 'Voici un message envoyé depuis un script HTML/PHP !';

$envoi = mail($to, $subject, $message);

if ($envoi == true)		echo "<br /><h1>L'email a été envoyé avec succès.</h1>";
else					echo "<br /><h1>&eacute;chec de l'envoi d'un email</h1>";
?>
