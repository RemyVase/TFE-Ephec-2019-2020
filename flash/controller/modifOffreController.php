<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$titre = $_POST["titreAnnonceOffreModif"];
$ville = $_POST["descAnnonceOffreModif"];
$etat = $_POST["villeAnnonceOffreModif"];
$desc = $_POST["etatAnnonceOffreModif"];

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce',[$_SESSION['id'],$idAnnonce]);

$modifOffre = $db->callProcedure('modifOffre', [$idAnnonce,$titre,$ville,$etat,$desc]);