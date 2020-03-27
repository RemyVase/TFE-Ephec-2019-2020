<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteDemande = $db->callProcedure('deleteDemande',[$_SESSION['idDemande']]);

header('Location: http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/vosDemandes.php');