<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idDemande = $_SESSION['idDemande'];
$titre = $_POST["titreAnnonceDemandeModif"];
$ville = $_POST["villeAnnonceDemandeModif"];
$desc = $_POST["descAnnonceDemandeModif"];

$modifDemande = $db->callProcedure('modifDemande', [$idDemande,$titre,$ville,$desc]);