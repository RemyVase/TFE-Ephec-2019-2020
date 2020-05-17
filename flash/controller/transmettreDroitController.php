<?php

session_start();
include 'dbAccess.php';

$db = new dbAccess();

$pseudo = htmlspecialchars($_POST['pseudoTransmet']);
echo json_encode($pseudo);

$transmettreDroits = $db->callProcedure('transmettreDroitAssoc',[$pseudo,$_SESSION['id']]);
unset($_SESSION['chefAssoc']);