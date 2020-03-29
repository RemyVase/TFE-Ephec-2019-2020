<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idDemande = $_SESSION['idDemande'];
$typeAnimal = htmlspecialchars($_POST["typeAnimalAnnonceDemandeModif"]);
$typeObjet = htmlspecialchars($_POST["typeObjetAnnonceDemandeModif"]);

echo json_encode($typeAnimal);
$checkAssocDemande = $db->callProcedure('checkAssocDemande',[$_SESSION['idAssoc'], $idDemande]);

$modifDemandeSelect = $db->callProcedure('modifSelectDemande', [$idDemande,$typeAnimal,$typeObjet]);
echo json_encode($modifDemandeSelect);