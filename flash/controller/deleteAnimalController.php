<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAnimal = $db->callProcedure('deleteAnimal',[$_SESSION['animal']]);

header('Location: ../vue/nosAnimaux.php');