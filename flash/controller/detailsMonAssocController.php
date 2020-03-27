<?php

include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION['id'];

if (isset($id) && $id > 0) {
    $detailsAssoc = $db->callProcedure("recupMonAssoc",[$id]);
} 

$recupAllMembre = $db->callProcedure('recupAllMembre');