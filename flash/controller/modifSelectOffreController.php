<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$etat = htmlspecialchars($_POST["etatAnnonceOffreModif"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimalAnnonceOffreModif"]);
$typeObjet = htmlspecialchars($_POST["typeObjetAnnonceOffreModif"]);
$token = htmlspecialchars($_POST["token"]);

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce', [$_SESSION['id'], $idAnnonce]);

if ($_SESSION['token'] == $token) {
    $modifOffreSelect = $db->callProcedure('modifSelectOffre', [$idAnnonce, $etat, $typeAnimal, $typeObjet]);
} else {
    echo json_encode('error CSRF');
}
