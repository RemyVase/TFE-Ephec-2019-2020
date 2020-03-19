<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION["animal"];
$nom = $_POST["nomAnimalModif"];
$age = $_POST["ageAnimalModif"];
$ville = $_POST["villeAnimalModif"];
$desc = $_POST["descAnimalModif"];
$statut = $_POST["statutAnimalModif"];

$modifAnimal = $db->callProcedure('modifAnimal', [$id,$nom,$age,$ville,$desc,$statut]);
