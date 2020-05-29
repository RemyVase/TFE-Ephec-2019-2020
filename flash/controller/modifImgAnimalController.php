<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnimal = $_SESSION["animal"];
$token = htmlspecialchars($_POST["token"]);

$file_name = htmlspecialchars($_FILES['fileAnimal']['name']);
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileAnimal']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");


//Va juste retenir l'extension (par exemple .png)
$extension = "." . strtolower(substr(strrchr($file_name, '.'), 1));
//Va juste retenir le nom de l'image par exemple (test.png) va devenir (test)
$nomImage = strstr($file_name, '.', true);

$cheminImgBdd = "../img/img_adoption/" . $nomImage . rand(1, 99999999) . $extension;

if ($_SESSION['token'] == $token) {
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
} else {
    echo json_encode('error CSRF');
}
