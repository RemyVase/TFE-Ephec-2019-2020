<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$titre = htmlspecialchars($_POST["titreAnnonceDemande"]);
$desc = htmlspecialchars($_POST["descAnnonceDemande"]);
$ville = htmlspecialchars($_POST["villeAnnonceDemande"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimalAnnonceDemande"]);
$typeObjet = htmlspecialchars($_POST["typeObjetAnnonceDemande"]);

$file_name = $_FILES['fileDemande']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileDemande']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_demande/" . $file_name . rand(1,99999999);

$checkDemande = $db->callProcedure('checkDemande', [$idAssoc,$titre,$ville]);

if(empty($checkDemande)){
if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
        $ajoutDemande = $db->callProcedure('ajoutDemande', [$idAssoc, $titre, $desc, $cheminImgBdd, $ville, $typeAnimal, $typeObjet]);
    } else {
        echo json_encode('imgPasOk');
    }
} else {
    echo json_encode('extPasOk');
}
} else {
    echo json_encode("demandeDejaLa");
}