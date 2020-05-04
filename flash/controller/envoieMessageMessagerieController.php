<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idConv = htmlspecialchars($_POST['idConv']);
$idEnvoyeur = htmlspecialchars($_POST['idUser']);
$message = htmlspecialchars($_POST['message']);

$envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConv, $message]);