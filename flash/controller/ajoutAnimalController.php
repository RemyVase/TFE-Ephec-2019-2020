<?php

include 'dbAccess.php';

$db = new dbAccess();

$nom = $_POST["nomAnimal"];
$age = $_POST["ageAnimal"];
$ville = $_POST["villeAnimal"];
$desc = $_POST["descAnimal"];

//var_dump($_FILES);
$file_name = $_FILES['fileAnimal']['name'];
$file_extension = strrchr($file_name, ".");

echo $file_name;

$file_tmp_name = $_FILES['fileAnimal']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

$cheminImgBdd = "../img/img_adoption/" . $file_name;

if (in_array($file_extension, $extension_autorisees)) {
    if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
        echo json_encode("imgOk");
    } else {
        echo json_encode('imgPasOk');
    }
}
else{
    echo json_encode('extPasOk');
}

//$ajoutAnimal = $db->callProcedure('ajoutAnimal', [$nom, $age, $ville, $desc, $cheminImgBdd]);
echo json_encode("C push");
