<?php

include 'dbAccess.php';

$db = new dbAccess();
$pseudo = htmlspecialchars($_POST["pseudoUser"]);
$email = htmlspecialchars($_POST["mailUser"]);
$password = hash("sha256", htmlspecialchars($_POST["passwordUser"]));
$ville = htmlspecialchars($_POST["villeUser"]);

$checkEmail = $db->callProcedure("checkMail", [$email]);
$checkPseudo = $db->callProcedure("checkPseudo", [$pseudo]);

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
if ($decode['success'] == true) {
    if (!empty($checkEmail)) {
        if (!empty($checkPseudo)) {
            echo json_encode("mailPseudoPasOk");
        } else {
            echo json_encode("mailPasOk");
        }
    } else if (!empty($checkPseudo)) {
        echo json_encode("pseudoPasOk");
    } else {
        $inscription = $db->callProcedure('ajoutUser', [$pseudo, $email, $password, $ville]);
        echo json_encode("ok");
    }
} else {
    echo json_encode('robot');
}
//FIN RECAPTCHA
