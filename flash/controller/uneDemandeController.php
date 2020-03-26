<?php

include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$_SESSION['idDemande'] = $_POST['buttonDemande'];

$checkAssocDemande = $db->callProcedure('checkAssocDemande', [$_SESSION['idAssoc'], $_SESSION['idDemande']]);

$recupOneDemande = $db->callProcedure('recupOneDemande', [$_SESSION['idDemande']]);