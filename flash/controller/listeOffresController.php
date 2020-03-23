<?php

include 'dbAccess.php';

$db = new dbAccess();

$nbOffrePerPage = 3;
$checkNbOffre = $db->callProcedure("checkNbOffre");
$intNbOffre = intval($checkNbOffre{0}[0]);
$nbPages = ceil($intNbOffre / $nbOffrePerPage);


if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
    $numPage = $_GET['p'];
} else {
    $numPage = 1;
}

$param = ($numPage - 1) * $nbOffrePerPage;

$recupAllOffre = $db->callProcedure("recupAllOffres", [$nbOffrePerPage, $param]);
