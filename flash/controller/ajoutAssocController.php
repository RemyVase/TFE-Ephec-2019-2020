<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$nom = htmlspecialchars($_POST["nomAssoc"]);
$adresse = htmlspecialchars($_POST["adresseAssoc"]);
$email = htmlspecialchars($_POST["emailAssoc"]);
$tel = htmlspecialchars($_POST["telAssoc"]);
$site = htmlspecialchars($_POST["siteAssoc"]);
$desc = htmlspecialchars($_POST["descAssoc"]);
$face = htmlspecialchars($_POST["facebookAssoc"]);
$insta = htmlspecialchars($_POST["instagramAssoc"]);
$placeQuar = htmlspecialchars($_POST["placesQuarantaineAssoc"]);
$placeReg = htmlspecialchars($_POST["placesReglesAssoc"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimalAssoc"]);

$file_name = $_FILES['fileAssoc']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAssoc']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_assoc/" . $file_name;

$checkAssoc = $db->callProcedure('checkAssoc', [$nom]);

if (empty($checkAssoc)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            echo json_encode("imgOk");
            $ajoutAssoc = $db->callProcedure('ajoutAssoc', [$nom, $adresse, $email, $tel, $site, $desc, $face, $insta, $placeQuar, $placeReg, $cheminImgBdd, $typeAnimal]);
        } else {
            echo json_encode('imgPasOk');
        }
    } else {
        echo json_encode('extPasOk');
    }
} else {
    echo json_encode('Association déjà présente');
}

$recupIdAssoc = $db->callProcedure('recupIdAssoc',[$nom]);

$addIdAssocIntoUser = $db->callProcedure('addIdAssocIntoUser',[$recupIdAssoc[0]{'id_assoc'},$_SESSION['id']]);

$_SESSION['idAssoc'] = $recupIdAssoc[0]{'id_assoc'};
