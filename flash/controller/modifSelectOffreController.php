<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$etat = htmlspecialchars($_POST["etatAnnonceOffreModif"]);
$typeAnimal = htmlspecialchars($_POST["typeAnimalAnnonceOffreModif"]);
$typeObjet = htmlspecialchars($_POST["typeObjetAnnonceOffreModif"]);

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce',[$_SESSION['id'],$idAnnonce]);

$modifOffreSelect = $db->callProcedure('modifSelectOffre', [$idAnnonce,$etat,$typeAnimal,$typeObjet]);