<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idDemande = $_SESSION['idDemande'];
$titre = htmlspecialchars($_POST["titreAnnonceDemandeModif"]);
$ville = htmlspecialchars($_POST["villeAnnonceDemandeModif"]);
$desc = htmlspecialchars($_POST["descAnnonceDemandeModif"]);

$checkAssocDemande = $db->callProcedure('checkAssocDemande',[$_SESSION['idAssoc'], $idDemande]);

$modifDemande = $db->callProcedure('modifDemande', [$idDemande,$titre,$ville,$desc]);