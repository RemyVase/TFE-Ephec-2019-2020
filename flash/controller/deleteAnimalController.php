<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$recupCheminImg = $db->callProcedure('recupCheminImgAnimal', [$_SESSION['animal']]);
unlink($recupCheminImg[0]{'img_animal'});

$deleteAnimal = $db->callProcedure('deleteAnimal',[$_SESSION['animal']]);

header('Location: ../vue/nosAnimaux.php');