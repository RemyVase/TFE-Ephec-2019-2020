<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$typeAnimal = htmlspecialchars($_POST["typeAnimalAssocModif"]);
$token = htmlspecialchars($_POST["token"]);

if ($_SESSION['token'] == $token) {
$modifSelectAssoc = $db->callProcedure('modifSelectAssoc', [$idAssoc,$typeAnimal]);
} else {
    echo json_encode('error CSRF');
}