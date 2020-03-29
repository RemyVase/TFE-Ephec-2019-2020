<?php

include 'dbAccess.php';

$db = new dbAccess();
$pseudo = htmlspecialchars($_POST["pseudoUser"]);
$email = htmlspecialchars($_POST["mailUser"]);
$password = hash("sha256",htmlspecialchars($_POST["passwordUser"]));

$checkEmail = $db->callProcedure("checkMail", [$email]);
$checkPseudo = $db->callProcedure("checkPseudo", [$pseudo]);

if (!empty($checkEmail)) {
    if (!empty($checkPseudo)) {
        echo json_encode("mailPseudoPasOk");
    } else {
        echo json_encode("mailPasOk");
    }
} else if (!empty($checkPseudo)) {
    echo json_encode("pseudoPasOk");
} else {
    $inscription = $db->callProcedure('ajoutUser', [$pseudo, $email, $password]);
    echo json_encode("ok");
}
