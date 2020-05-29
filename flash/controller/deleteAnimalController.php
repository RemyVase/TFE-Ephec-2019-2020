<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();
$token = $_GET['token'];

if ($_SESSION['token'] == $token) {
$recupCheminImg = $db->callProcedure('recupCheminImgAnimal', [$_SESSION['animal']]);
unlink($recupCheminImg[0]{'img_animal'});


$deleteAnimal = $db->callProcedure('deleteAnimal',[$_SESSION['animal']]);

header('Location: ../vue/nosAnimaux.php');
} else {
    echo json_encode('error CSRF');
}
