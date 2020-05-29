<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idDemande = $_SESSION['idDemande'];
$titre = htmlspecialchars($_POST["titreAnnonceDemandeModif"]);
$ville = htmlspecialchars($_POST["villeAnnonceDemandeModif"]);
$desc = htmlspecialchars($_POST["descAnnonceDemandeModif"]);
$token = htmlspecialchars($_POST["token"]);

$checkAssocDemande = $db->callProcedure('checkAssocDemande',[$_SESSION['idAssoc'], $idDemande]);

if ($_SESSION['token'] == $token) {
$modifDemande = $db->callProcedure('modifDemande', [$idDemande,$titre,$ville,$desc]);
} else {
    echo json_encode('error CSRF');
}