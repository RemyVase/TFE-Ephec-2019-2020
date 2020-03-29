<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAssoc = $db->callProcedure('deleteAssoc',[$_SESSION['idAssoc']]);
$_SESSION['idAssoc'] = NULL;

header('Location: http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/accueil.php');