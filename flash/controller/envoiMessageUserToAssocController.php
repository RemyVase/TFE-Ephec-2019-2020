<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idEnvoyeur = htmlspecialchars($_SESSION['id']);
$idReceveur = htmlspecialchars($_SESSION['idReceveur']);
$message = htmlspecialchars($_POST['message']);
$token = htmlspecialchars($_POST["token"]);



$checkUserConv = $db->callProcedure('messageCheckUserConv', [$idEnvoyeur, $idReceveur]);
$checkAssocToAssocConv = $db->callProcedure('messageCheckAssocToAssocConv', [$_SESSION['idAssoc'], $idReceveur]);

if ($_SESSION['token'] == $token) {
    if (empty($_SESSION['idAssoc'])) {
        if (empty($checkUserConv)) {
            $conversation = $db->callProcedure('messageCreateConvers', [$idReceveur]);
            $idConvers = $db->callProcedure('messageTakeLastConvCree');
            $lierConversation = $db->callProcedure('messageLierConversation', [$idEnvoyeur, intval($idConvers[0]{
                'id_convers'})]);
            $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConvers[0]{
                'id_convers'}, $message]);
        } else {
            $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, intval($checkUserConv[0]{
                'id_convers'}), $message]);
        }
    } else {
        if (empty($checkAssocToAssocConv)) {
            $conversation = $db->callProcedure('messageCreateConvers', [$idReceveur]);
            $idConvers = $db->callProcedure('messageTakeLastConvCree');
            $lierConversation = $db->callProcedure('messageLierConversationToAssoc', [$_SESSION['idAssoc'], intval($idConvers[0]{
                'id_convers'})]);
            $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConvers[0]{
                'id_convers'}, $message]);
        } else {
            $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, intval($checkAssocToAssocConv[0]{
                'id_convers'}), $message]);
        }
    }
} else {
    echo json_encode('error CSRF');
}
