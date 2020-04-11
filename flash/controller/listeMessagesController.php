<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();


$checkEnvoyeurLastMessage = $db->callProcedure('messageCheckEnvoyeurLastMessage',[$_POST['data']]);
$checkAssocUser = $db->callProcedure('messageCheckSiEnvoyeurDansAssoc',[$checkEnvoyeurLastMessage[0]{'id_envoyeur'}]);

//checker si l'id user et/ou l'id assoc de la session correspond bien à ceux lier à la conversation

if(empty($_SESSION['idAssoc'])){
    $checkSiFraude = $db->callProcedure('messageCheckSiFraude',[$_POST['data'],$_SESSION['id']]);
}else {
    $checkSiFraude = $db->callProcedure('messageCheckSiFraudeAssoc',[$_POST['data'],$_SESSION['idAssoc']]);
    if (empty($checkSiFraude)) {
        $checkSiFraude = $db->callProcedure('messageCheckSiFraudeAssocConvers',[$_POST['data'],$_SESSION['idAssoc']]);
    }
}

if(!empty($checkSiFraude)){
    if($checkEnvoyeurLastMessage[0]{'id_envoyeur'} === $_SESSION['id']){
    $recupAllMessage = $db->callProcedure('messageRecupAllMessage',[$_POST['data']]);
    echo json_encode($recupAllMessage);
    }else{
        if($checkAssocUser[0]{'id_assoc'} === $_SESSION['idAssoc']){
            $recupAllMessage = $db->callProcedure('messageRecupAllMessage',[$_POST['data']]);
            echo json_encode($recupAllMessage);
        }else {
            $recupAllMessage = $db->callProcedure('messageRecupAllMessage',[$_POST['data']]);
            $messageLu = $db->callProcedure('messageLu',[$_POST['data']]);
            echo json_encode($recupAllMessage);
        }
    }
}else{
    echo json_encode('fraude');
}