<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idDemande = $_SESSION['idDemande'];

$file_name = $_FILES['fileDemandeModif']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileDemandeModif']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_demande/" . $file_name;

if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
        $modifImgDemande = $db->callProcedure('modifImgDemande', [$idDemande, $cheminImgBdd]);
    } else {
        echo json_encode('imgPasOk');
    }
} else {
    echo json_encode('extPasOk');
}