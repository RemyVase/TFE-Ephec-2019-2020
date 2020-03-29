<?php

include 'dbAccess.php';

$db = new dbAccess();


if (isset($_GET['typeAnimal'])) {
    $nbDemandePerPage = 3;
    $checkNbDemande = $db->callProcedure("checkNbDemandeTypeAnimal",[$_GET['typeAnimal']]);
    $intNbDemande = intval($checkNbDemande{0}[0]);
    $nbPages = ceil($intNbDemande / $nbDemandePerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbDemandePerPage;

    $recupAllDemande = $db->callProcedure("recupAllDemandesTypeAnimal", [$nbDemandePerPage, $param,$_GET['typeAnimal']]);

} else if (isset($_GET['typeObjet'])) {
    $nbDemandePerPage = 3;
    $checkNbDemande = $db->callProcedure("checkNbDemandeTypeObjet",[$_GET['typeObjet']]);
    $intNbDemande = intval($checkNbDemande{0}[0]);
    $nbPages = ceil($intNbDemande / $nbDemandePerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbDemandePerPage;

    $recupAllDemande = $db->callProcedure("recupAllDemandesTypeObjet", [$nbDemandePerPage, $param,$_GET['typeObjet']]);

} else {
    $nbDemandePerPage = 3;
    $checkNbDemande = $db->callProcedure("checkNbDemande");
    $intNbDemande = intval($checkNbDemande{0}[0]);
    $nbPages = ceil($intNbDemande / $nbDemandePerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbDemandePerPage;

    $recupAllDemande = $db->callProcedure("recupAllDemandes", [$nbDemandePerPage, $param]);
}
