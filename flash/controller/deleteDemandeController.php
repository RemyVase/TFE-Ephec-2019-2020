<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();
$token = $_GET['token'];

if ($_SESSION['token'] == $token) {
$recupCheminImg = $db->callProcedure('recupCheminImgDemande', [$_SESSION['idDemande']]);
unlink($recupCheminImg[0]{'img'});

$deleteDemande = $db->callProcedure('deleteDemande',[$_SESSION['idDemande']]);

header('Location: ../vue/vosDemandes.php');
} else {
    echo json_encode('error CSRF');
}