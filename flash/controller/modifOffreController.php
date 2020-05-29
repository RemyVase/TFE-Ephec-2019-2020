<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$titre = htmlspecialchars($_POST["titreAnnonceOffreModif"]);
$ville = htmlspecialchars($_POST["villeAnnonceOffreModif"]);
$desc = htmlspecialchars($_POST["descAnnonceOffreModif"]);
$token = htmlspecialchars($_POST["token"]);

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce', [$_SESSION['id'], $idAnnonce]);

if ($_SESSION['token'] == $token) {
    $modifOffre = $db->callProcedure('modifOffre', [$idAnnonce, $titre, $desc, $ville]);
} else {
    echo json_encode('error CSRF');
}
