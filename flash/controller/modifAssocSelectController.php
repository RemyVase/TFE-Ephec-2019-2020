<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$typeAnimal = htmlspecialchars($_POST["typeAnimalAssocModif"]);

$modifSelectAssoc = $db->callProcedure('modifSelectAssoc', [$idAssoc,$typeAnimal]);