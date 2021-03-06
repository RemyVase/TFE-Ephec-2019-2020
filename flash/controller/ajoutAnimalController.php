<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$nom = htmlspecialchars($_POST["nomAnimal"]);
$age = htmlspecialchars($_POST["ageAnimal"]);
$ville = htmlspecialchars($_POST["villeAnimal"]);
$desc = htmlspecialchars($_POST["descAnimal"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimal"]);

$file_name = htmlspecialchars($_FILES['fileAnimal']['name']);
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAnimal']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

//Va juste retenir l'extension (par exemple .png)
$extension = "." . strtolower(substr(strrchr($file_name,'.'),1));
//Va juste retenir le nom de l'image par exemple (test.png) va devenir (test)
$nomImage = strstr($file_name,'.',true);

$cheminImgBdd = "../img/img_adoption/" . $nomImage . rand(1,99999999) . $extension;

$checkAnimal = $db->callProcedure('checkAnimal', [$nom, $age, $ville]);

if (empty($checkAnimal)) {
    if (in_array($file_extension, $extension_autorisees)) {
        if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
            echo json_encode("imgOk");
            $ajoutAnimal = $db->callProcedure('ajoutAnimal', [$idAssoc, $nom, $age, $ville, $desc, $cheminImgBdd,$typeAnimal]);
        } else {
            echo json_encode('imgPasOk');
        }
    } else {
    echo json_encode('extPasOk');
    }
}
else{
    echo json_encode("Animal deja present.");
}

