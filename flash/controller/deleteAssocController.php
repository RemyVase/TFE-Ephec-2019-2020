<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAssoc = $db->callProcedure('deleteAssoc',[$_SESSION['idAssoc']]);
$_SESSION['idAssoc'] = NULL;

header('Location: ../vue/accueil.php');