<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idConv = $_POST['idConv'];
$idEnvoyeur = $_POST['idUser'];
$message = $_POST['message'];

$envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConv, $message]);