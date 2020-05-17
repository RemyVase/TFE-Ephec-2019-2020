<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAnnonce = $db->callProcedure('deleteOffre',[$_SESSION['idAnnonce']]);

header('Location: ../vue/vosAnnonces.php');