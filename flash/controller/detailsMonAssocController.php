<?php

include 'dbAccess.php';

$db = new dbAccess();

$id = $_GET['assoc'];

if (isset($id) && $id > 0) {
    $detailsAssoc = $db->callProcedure("recupMonAssoc",[$id]);
} 