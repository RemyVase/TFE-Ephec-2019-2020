<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$deleteAnimal = $db->callProcedure('deleteAnimal',[$_SESSION['animal']]);

header('Location: http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/nosAnimaux.php');