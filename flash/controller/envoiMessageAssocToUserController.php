<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idEnvoyeur = htmlspecialchars($_SESSION['id']);
$idReceveur = htmlspecialchars($_SESSION['idReceveur']);
$message = htmlspecialchars($_POST['message']);

$checkUserConv = $db->callProcedure('messageCheckUserConv', [$_SESSION['idAssoc'],$idReceveur]);

$checkAssocUser = $db->callProcedure('messageCheckSiEnvoyeurDansAssoc',[$idReceveur]);

$checkAssocToAssocConv = $db->callProcedure('messageCheckAssocToAssocConv', [$_SESSION['idAssoc'], $checkAssocUser[0]{'id_assoc'}]);

if($checkAssocUser[0]{'id_assoc'} === NULL){
    if (empty($checkUserConv)) {
        $conversation = $db->callProcedure('messageCreateConvers',[$_SESSION['idAssoc']]);
        $idConvers = $db->callProcedure('messageTakeLastConvCree');
        $lierConversation = $db->callProcedure('messageLierConversation', [$idReceveur, intval($idConvers[0]{'id_convers'})]);
        $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, $idConvers[0]{'id_convers'}, $message]);
    } else {
        $envoiMessage = $db->callProcedure('messageEnvoiMessage', [$idEnvoyeur, intval($checkUserConv[0]{'id_convers'}), $message]);
    }
}else{
    if(empty($checkAssocToAssocConv)){
        $conversation = $db->callProcedure('messageCreateConvers', [$checkAssocToAssocConv[0]{'id_assoc'}]);
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
