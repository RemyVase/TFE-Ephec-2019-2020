<?php

include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION['animal'];

if (isset($id) && $id > 0) {
    $detailsAnimal = $db->callProcedure("recupOneAnimal",[$id]);
} 
