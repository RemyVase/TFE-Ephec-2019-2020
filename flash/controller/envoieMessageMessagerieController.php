<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idConv = htmlspecialchars($_POST['idConv']);
$idEnvoyeur = htmlspecialchars($_POST['idUser']);
$message = htmlspecialchars($_POST['message']);
$token = htmlspecialchars($_POST["token"]);

if ($_SESSION['token'] == $token) {
    $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConv, $message]);
} else {
    echo json_encode('error CSRF');
}
