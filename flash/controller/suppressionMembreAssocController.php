<?php

session_start();

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = htmlspecialchars($_POST['pseudoSupp']);
$token = htmlspecialchars($_POST["token"]);

if ($_SESSION['token'] == $token) {
    $suppressionMembre = $db->callProcedure('supprimerMembreAssoc', [$pseudo, $_SESSION['idAssoc']]);
} else {
    echo json_encode('error CSRF');
}
