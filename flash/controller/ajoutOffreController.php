<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idUser = $_SESSION['id'];
$titre = $_POST["titreAnnonceOffre"];
$desc = $_POST["descAnnonceOffre"];
$ville = $_POST["villeAnnonceOffre"];
$etat = $_POST["etatAnnonceOffre"];

//var_dump($_FILES);
$file_name = $_FILES['fileOffre']['name'];
$file_extension = strrchr($file_name, ".");

echo $file_name;

$file_tmp_name = $_FILES['fileOffre']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_offre/" . $file_name;

//$checkAnimal = $db->callProcedure('checkAnimal', [$nom, $age, $ville]);

//if (empty($checkAnimal)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            echo json_encode("imgOk");
            $ajoutAnimal = $db->callProcedure('ajoutOffre', [$idUser, $titre, $desc, $ville, $etat, $cheminImgBdd]);
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

