<?php

include 'dbAccess.php';

$db = new dbAccess();

$id = $_SESSION['id'];
$nbOffrePerPage = 3;
$checkNbOffre = $db->callProcedure("checkNbMesOffres",[$id]);
$intNbOffre = intval($checkNbOffre{0}[0]);
$nbPages = ceil($intNbOffre / $nbOffrePerPage);


if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
    $numPage = $_GET['p'];
} else {
    $numPage = 1;
}

$param = ($numPage - 1) * $nbOffrePerPage;

$recupAllMesOffres = $db->callProcedure("recupAllMesOffres", [$nbOffrePerPage, $param, $id]);

