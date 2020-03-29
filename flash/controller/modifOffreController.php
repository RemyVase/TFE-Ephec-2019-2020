<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$titre = htmlspecialchars($_POST["titreAnnonceOffreModif"]);
$ville = htmlspecialchars($_POST["descAnnonceOffreModif"]);
$desc = htmlspecialchars($_POST["etatAnnonceOffreModif"]);

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce',[$_SESSION['id'],$idAnnonce]);

$modifOffre = $db->callProcedure('modifOffre', [$idAnnonce,$titre,$desc,$ville]);