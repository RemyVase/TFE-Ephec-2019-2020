<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION["animal"];
$typeAnimal = htmlspecialchars($_POST["typeAnimalModif"]);
$token = htmlspecialchars($_POST["token"]);

if ($_SESSION['token'] == $token) {
$modifAnimalSelect = $db->callProcedure('modifSelectAnimal', [$id,$typeAnimal]);
} else {
    echo json_encode('error CSRF');
}