<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();


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
    $recupAllMessage = $db->callProcedure('messageRecupAllMessage',[$_POST['data']]);
    echo json_encode($recupAllMessage);
}else{
    echo json_encode('fraude');
}

//echo json_encode($_POST['data']);
