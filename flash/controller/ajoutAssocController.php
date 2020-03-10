<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION['id'];
$nom = $_POST["nomAssoc"];
$adresse = $_POST["adresseAssoc"];
$email = $_POST["emailAssoc"];
$tel = $_POST["telAssoc"];
$site = $_POST["siteAssoc"];
$desc = $_POST["descAssoc"];
$face = $_POST["facebookAssoc"];
$insta = $_POST["instagramAssoc"];
$placeQuar = $_POST["placesQuarantaineAssoc"];
$placeReg = $_POST["placesReglesAssoc"];

$file_name = $_FILES['fileAssoc']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAssoc']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_assoc/" . $file_name;

$checkUserIntoAssoc = $db->callProcedure('checkUserIntoAssoc', [$id]);

if (empty($checkUserIntoAssoc)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            echo json_encode("imgOk");
            $ajoutAssoc = $db->callProcedure('ajoutAssoc', [$id, $nom, $adresse, $email, $tel, $site, $desc, $face, $insta, $placeQuar, $placeReg, $cheminImgBdd]);
        } else {
            echo json_encode('imgPasOk');
        }
    } else {
        echo json_encode('extPasOk');
    }
}
else{
    echo json_encode('UserDejaDansAssoc');
}
