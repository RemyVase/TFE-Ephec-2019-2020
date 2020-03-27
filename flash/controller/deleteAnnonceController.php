<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAnnonce = $db->callProcedure('deleteOffre',[$_SESSION['idAnnonce']]);

header('Location: http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/vosAnnonces.php');