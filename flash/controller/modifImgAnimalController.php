<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnimal = $_SESSION["animal"];

$file_name = $_FILES['fileAnimal']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAnimal']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_adoption/" . $file_name;

if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
        $modifImgAnimal = $db->callProcedure('modifImgAnimal', [$idAnimal, $cheminImgBdd]);
    } else {
        echo json_encode('imgPasOk');
    }
} else {
    echo json_encode('extPasOk');
}