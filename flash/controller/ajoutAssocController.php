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
$banque = htmlspecialchars($_POST["iban"]);

$file_name = $_FILES['fileAssoc']['name'];
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAssoc']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

//Va juste retenir l'extension (par exemple .png)
$extension = "." . strtolower(substr(strrchr($file_name, '.'), 1));
//Va juste retenir le nom de l'image par exemple (test.png) va devenir (test)
$nomImage = strstr($file_name, '.', true);

$cheminImgBdd = "../img/img_assoc/" . $nomImage . rand(1, 99999999) . $extension;

$checkAssoc = $db->callProcedure('checkAssoc', [$nom]);

if (empty($checkAssoc)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            $ajoutAssoc = $db->callProcedure('ajoutAssoc', [$nom, $adresse, $email, $tel, $site, $desc, $face, $insta, $placeQuar, $placeReg, $cheminImgBdd, $typeAnimal, $banque]);
            $recupIdAssoc = $db->callProcedure('recupIdAssoc', [$nom]);
            $addIdAssocIntoUser = $db->callProcedure('addIdAssocIntoUser', [$recupIdAssoc[0]{'id_assoc'}, $_SESSION['id']]);
            $chefAssoc = $db->callProcedure('ajoutChefAssoc', [$_SESSION['id']]);
            $_SESSION['chefAssoc'] = "1";
            $_SESSION['idAssoc'] = $recupIdAssoc[0]{'id_assoc'};
            echo json_encode("imgOk");
        } else {
            echo json_encode('imgPasOk');
        }
    } else {
        echo json_encode('extPasOk');
    }
} else {
    echo json_encode('assocDejaPresente');
}
