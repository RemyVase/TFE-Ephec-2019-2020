<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$recupCheminImg = $db->callProcedure('recupCheminImgAssoc', [$_SESSION['idAssoc']]);
unlink($recupCheminImg[0]{'img'});

$deleteAssoc = $db->callProcedure('deleteAssoc',[$_SESSION['idAssoc']]);
$_SESSION['idAssoc'] = NULL;

header('Location: ../vue/accueil.php');