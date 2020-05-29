<?php

session_start();

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = htmlspecialchars($_POST['pseudoAjout']);
$token = htmlspecialchars($_POST["token"]);

$checkSiDejaDansAssoc = $db->callProcedure('checkSiDejaDansAssoc', [$pseudo]);

if ($_SESSION['token'] == $token) {
    if ($checkSiDejaDansAssoc[0]{
    'id_assoc'} === null) {
        $ajoutMembre = $db->callProcedure('ajoutMembreAssoc', [$pseudo, $_SESSION['idAssoc']]);
    } else {
        echo json_encode("UserDejaDansUneAssoc");
    }
} else {
    echo json_encode('error CSRF');
}
