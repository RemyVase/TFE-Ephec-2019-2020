<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION["animal"];
$nom = htmlspecialchars($_POST["nomAnimalModif"]);
$age = htmlspecialchars($_POST["ageAnimalModif"]);
$ville = htmlspecialchars($_POST["villeAnimalModif"]);
$desc = htmlspecialchars($_POST["descAnimalModif"]);
$statut = htmlspecialchars($_POST["statutAnimalModif"]);

$modifAnimal = $db->callProcedure('modifAnimal', [$id, $nom, $age, $ville, $desc, $statut]);

