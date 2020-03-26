<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAnnonce = $_SESSION['idAnnonce'];
$etat = $_POST["etatAnnonceOffreModif"];
$typeAnimal = $_POST["typeAnimalAnnonceOffreModif"];
$typeObjet = $_POST["typeObjetAnnonceOffreModif"];

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce',[$_SESSION['id'],$idAnnonce]);

$modifOffreSelect = $db->callProcedure('modifSelectOffre', [$idAnnonce,$etat,$typeAnimal,$typeObjet]);