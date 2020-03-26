<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$nom = $_POST["nomAnimal"];
$age = $_POST["ageAnimal"];
$ville = $_POST["villeAnimal"];
$desc = $_POST["descAnimal"];
$typeAnimal = $_POST["typeAnimal"];

//var_dump($_FILES);
$file_name = $_FILES['fileAnimal']['name'];
$file_extension = strrchr($file_name, ".");

echo $file_name;

$file_tmp_name = $_FILES['fileAnimal']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_adoption/" . $file_name;

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
    echo json_encode("Animal déjà présent.");
}

