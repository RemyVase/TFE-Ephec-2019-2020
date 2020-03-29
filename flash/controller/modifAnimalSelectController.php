<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION["animal"];
$typeAnimal = htmlspecialchars($_POST["typeAnimalModif"]);

$modifAnimalSelect = $db->callProcedure('modifSelectAnimal', [$id,$typeAnimal]);