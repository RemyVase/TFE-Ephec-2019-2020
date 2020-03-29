<?php

include 'dbAccess.php';

$db = new dbAccess();

if (isset($_GET['typeAnimal'])) {
    $nbOffrePerPage = 3;
    $checkNbOffre = $db->callProcedure("checkNbOffreTypeAnimal",[$_GET['typeAnimal']]);
    $intNbOffre = intval($checkNbOffre{0}[0]);
    $nbPages = ceil($intNbOffre / $nbOffrePerPage);


    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbOffrePerPage;

    $recupAllOffre = $db->callProcedure("recupAllOffresTypeAnimal", [$nbOffrePerPage, $param,$_GET['typeAnimal']]);

} else if (isset($_GET['typeObjet'])) {
    $nbOffrePerPage = 3;
    $checkNbOffre = $db->callProcedure("checkNbOffreTypeObjet",[$_GET['typeObjet']]);
    $intNbOffre = intval($checkNbOffre{0}[0]);
    $nbPages = ceil($intNbOffre / $nbOffrePerPage);


    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbOffrePerPage;

    $recupAllOffre = $db->callProcedure("recupAllOffresTypeObjet", [$nbOffrePerPage, $param,$_GET['typeObjet']]);

} else if (isset($_GET['etat'])) {
    $nbOffrePerPage = 3;
    $checkNbOffre = $db->callProcedure("checkNbOffreEtat",[$_GET['etat']]);
    $intNbOffre = intval($checkNbOffre{0}[0]);
    $nbPages = ceil($intNbOffre / $nbOffrePerPage);


    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbOffrePerPage;

    $recupAllOffre = $db->callProcedure("recupAllOffresEtat", [$nbOffrePerPage, $param,$_GET['etat']]);

} else {
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
}
