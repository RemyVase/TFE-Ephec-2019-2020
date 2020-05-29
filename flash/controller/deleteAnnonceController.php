<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();
$token = $_GET['token'];

if ($_SESSION['token'] == $token) {
$recupCheminImg = $db->callProcedure('recupCheminImgAnnonce', [$_SESSION['idAnnonce']]);
unlink($recupCheminImg[0]{'img'});

$deleteAnnonce = $db->callProcedure('deleteOffre',[$_SESSION['idAnnonce']]);

header('Location: ../vue/vosAnnonces.php');
} else {
    echo json_encode('error CSRF');
}