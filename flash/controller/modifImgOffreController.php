<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];

$file_name = htmlspecialchars($_FILES['fileOffreModif']['name']);
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileOffreModif']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_offre/" . $file_name;

if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
        $modifImgAnnonce = $db->callProcedure('modifImgOffre', [$idAnnonce, $cheminImgBdd]);
    } else {
        echo json_encode('imgPasOk');
    }
} else {
    echo json_encode('extPasOk');
}