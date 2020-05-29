<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();
$token = $_GET['token'];

if ($_SESSION['token'] == $token) {
$recupCheminImg = $db->callProcedure('recupCheminImgAssoc', [$_SESSION['idAssoc']]);
unlink($recupCheminImg[0]{'img'});

$deleteAssoc = $db->callProcedure('deleteAssoc',[$_SESSION['idAssoc']]);
$_SESSION['idAssoc'] = NULL;

header('Location: ../vue/accueil.php');
} else {
    echo json_encode('error CSRF');
}