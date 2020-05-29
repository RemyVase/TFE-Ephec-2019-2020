<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idUser = $_SESSION['id'];
$titre = htmlspecialchars($_POST["titreAnnonceOffre"]);
$desc = htmlspecialchars($_POST["descAnnonceOffre"]);
$ville = htmlspecialchars($_POST["villeAnnonceOffre"]);
$etat = htmlspecialchars($_POST["etatAnnonceOffre"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimalAnnonceOffre"]);
$typeObjet = htmlspecialchars($_POST["typeObjetAnnonceOffre"]);
$token = htmlspecialchars($_POST["token"]);

$file_name = htmlspecialchars($_FILES['fileOffre']['name']);
$file_extension = strrchr($file_name, ".");

$file_tmp_name = $_FILES['fileOffre']['tmp_name'];
$extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG");

//Va juste retenir l'extension (par exemple .png)
$extension = "." . strtolower(substr(strrchr($file_name, '.'), 1));
//Va juste retenir le nom de l'image par exemple (test.png) va devenir (test)
$nomImage = strstr($file_name, '.', true);

$cheminImgBdd = "../img/img_offre/" . $nomImage . rand(1, 99999999) . $extension;

$checkOffre = $db->callProcedure('checkOffre', [$idUser, $titre, $desc]);

//RECAPTCHA

// Ma clé privée
$secret = "6LeqO_0UAAAAAHhufx9H_vIY6CRIcAjpolWMv4Kl";
// Paramètre renvoyé par le recaptcha
$response = $_POST['g-recaptcha-response'];
// On récupère l'IP de l'utilisateur
$remoteip = $_SERVER['REMOTE_ADDR'];

$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
    . $secret
    . "&response=" . $response
    . "&remoteip=" . $remoteip;

$decode = json_decode(file_get_contents($api_url), true);

if ($_SESSION['token'] == $token) {
    if ($decode['success'] == true) {
        if (empty($checkOffre)) {
            if (in_array($file_extension, $extension_autorisees)) {
                if (move_uploaded_file($file_tmp_name, $cheminImgBdd)) {
                    echo json_encode("imgOk");
                    $ajoutOffre = $db->callProcedure('ajoutOffre', [$idUser, $titre, $desc, $ville, $etat, $cheminImgBdd, $typeAnimal, $typeObjet]);
                } else {
                    echo json_encode('imgPasOk');
                }
            } else {
                echo json_encode('extPasOk');
            }
        } else {
            echo json_encode("annonceDejaLa");
        }
    } else {
        echo json_encode('robot');
    }
} else {
    echo json_encode('error CSRF');
}
//FIN RECAPTCHA