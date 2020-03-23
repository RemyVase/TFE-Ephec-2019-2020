<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$titre = $_POST["titreAnnonceDemande"];
$desc = $_POST["descAnnonceDemande"];
$ville = $_POST["villeAnnonceDemande"];

//var_dump($_FILES);
$file_name = $_FILES['fileDemande']['name'];
$file_extension = strrchr($file_name, ".");

echo $file_name;

$file_tmp_name = $_FILES['fileDemande']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_demande/" . $file_name;

//$checkAnimal = $db->callProcedure('checkAnimal', [$nom, $age, $ville]);

//if (empty($checkAnimal)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            echo json_encode("imgOk");
            $ajoutDemande = $db->callProcedure('ajoutDemande', [$idAssoc, $titre, $desc, $cheminImgBdd, $ville]);
        } else {
            echo json_encode('imgPasOk');
        }
    } else {
    echo json_encode('extPasOk');
    }
/*}
else{
    echo json_encode("Animal déjà présent.");
}*/

