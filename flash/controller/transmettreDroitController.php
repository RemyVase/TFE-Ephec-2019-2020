<?php

session_start();
include 'dbAccess.php';

$db = new dbAccess();

$pseudo = htmlspecialchars($_POST['pseudoTransmet']);
$token = htmlspecialchars($_POST["token"]);
echo json_encode($pseudo);

if ($_SESSION['token'] == $token) {
    $transmettreDroits = $db->callProcedure('transmettreDroitAssoc', [$pseudo, $_SESSION['id']]);
    unset($_SESSION['chefAssoc']);
} else {
    echo json_encode('error CSRF');
}
