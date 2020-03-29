<?php
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$password = hash("sha256",htmlspecialchars($_POST["previousPassword"]));
$newPassword = hash("sha256",htmlspecialchars($_POST["passwordUserChange"]));
$id = $_SESSION["id"];

$checkPassword = $db->callProcedure("checkPassword", [$id]);

if ($password !== $checkPassword[0]{'mdp_user'}) {
    echo json_encode("mdpPasOk");
} else {
    $db->callProcedure("gestionDeCompte",[$id, $newPassword]);
}