<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];

$file_name = htmlspecialchars($_FILES['fileAssoc']['name']);
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAssoc']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_assoc/" . $file_name . rand(1,99999999);

if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
        $modifImgAssoc = $db->callProcedure('modifImgAssoc', [$idAssoc, $cheminImgBdd]);
    } else {
        echo json_encode('imgPasOk');
    }
} else {
    echo json_encode('extPasOk');
}
