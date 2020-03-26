<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$titre = $_POST["titreAnnonceOffreModif"];
$ville = $_POST["descAnnonceOffreModif"];
$desc = $_POST["etatAnnonceOffreModif"];

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce',[$_SESSION['id'],$idAnnonce]);

$modifOffre = $db->callProcedure('modifOffre', [$idAnnonce,$titre,$desc,$ville]);