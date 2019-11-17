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

$Nom = htmlspecialchars($_POST['Nom']);
$Description = htmlspecialchars($_POST['Description']);
$Date =  htmlspecialchars($_POST['Date']);
$Prix =  htmlspecialchars($_POST['Prix']);
$Mensuel =  htmlspecialchars($_POST['Mensuel']);

$requete = $db->prepare("INSERT INTO evenements (Nom, Description, Date, Prix, file_name, uploaded_on, Mensuel, Valide) VALUES (:Nom, :Description, :Date, :Prix, 'defaut.png', 0, :Mensuel, 1)");

$requete->bindValue(':Nom', $Nom, PDO::PARAM_STR);
$requete->bindValue(':Description', $Description, PDO::PARAM_STR);
$requete->bindValue(':Date', $Date, PDO::PARAM_STR);
$requete->bindValue(':Prix', $Prix, PDO::PARAM_STR);
$requete->bindValue(':Mensuel', $Mensuel, PDO::PARAM_STR);
$requete->execute();
$requete->closeCursor();

// Include the database configuration file

$statusMsg = '';

// File upload path
$targetDir = "Uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("UPDATE evenements SET file_name = '".$fileName."' WHERE Nom='$Nom'");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
header("location:admin.php");
exit();

?>