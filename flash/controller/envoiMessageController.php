<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idEnvoyeur = $_SESSION['id'];
$idReceveur = $_SESSION['idReceveur'];
$message = $_POST['message'];

$checkUserConv = $db->callProcedure('messageCheckUserConv', [$idEnvoyeur, $idReceveur]);

if (empty($checkUserConv)) {
    $conversation = $db->callProcedure('messageCreateConvers');
    $idConvers = $db->callProcedure('messageTakeLastConvCree');
    $lierConversation = $db->callProcedure('messageLierConversation', [$idEnvoyeur, $idReceveur, intval($idConvers[0]{'id_convers'})]);
    $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConvers[0]{'id_convers'}, $message]);
} else {
    $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, intval($checkUserConv[0]{'id_convers'}), $message]);
}
