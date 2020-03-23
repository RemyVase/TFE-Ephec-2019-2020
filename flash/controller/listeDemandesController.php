<?php

include 'dbAccess.php';

$db = new dbAccess();

$nbDemandePerPage = 3;
$checkNbDemande= $db->callProcedure("checkNbDemande");
$intNbDemande = intval($checkNbDemande{0}[0]);
$nbPages = ceil($intNbDemande / $nbDemandePerPage);


if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
    $numPage = $_GET['p'];
} else {
    $numPage = 1;
}

$param = ($numPage - 1) * $nbDemandePerPage;

$recupAllDemande = $db->callProcedure("recupAllDemandes", [$nbDemandePerPage, $param]);
