<?php

include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$_SESSION['idDemande'] = $_POST['buttonDemande'];

$recupOneDemande = $db->callProcedure('recupOneDemande', [$_SESSION['idDemande']]);