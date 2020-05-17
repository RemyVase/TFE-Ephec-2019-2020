<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteDemande = $db->callProcedure('deleteDemande',[$_SESSION['idDemande']]);

header('Location: ../vue/vosDemandes.php');