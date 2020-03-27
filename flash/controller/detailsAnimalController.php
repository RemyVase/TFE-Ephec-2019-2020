<?php

include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION['animal'];
$idAssoc = $_SESSION['idAssoc'];

$checkAssocAnimal = $db->callProcedure('checkAssocAnimal',[$idAssoc,$id]);

if (isset($id) && $id > 0) {
    $detailsAnimal = $db->callProcedure("recupOneAnimal",[$id]);
} 
