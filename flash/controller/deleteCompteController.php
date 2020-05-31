<?php 
session_start();

include 'dbAccess.php';

$db = new dbAccess();
$token = $_GET['token'];

if ($_SESSION['token'] == $token) {
$deleteCompte = $db->callProcedure('deleteCompte',[$_SESSION['id']]);
session_destroy();

header('Location: ../vue/accueil.php');
} else {
    echo json_encode('error CSRF');
}