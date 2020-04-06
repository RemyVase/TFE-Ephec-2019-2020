<?php

session_start();

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = htmlspecialchars($_POST['pseudoSupp']);

    $suppressionMembre = $db->callProcedure('supprimerMembreAssoc',[$pseudo,$_SESSION['idAssoc']]);