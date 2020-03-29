<?php

include 'dbAccess.php';

$db = new dbAccess();

if (isset($_GET['typeAnimal'])) {
    $nbAnimauxPerPage = 3;
    $checkNbAnimaux = $db->callProcedure("checkNbAnimauxTypeAnimal",[$_GET['typeAnimal']]);
    $intNbAnimaux = intval($checkNbAnimaux{0}[0]);
    $nbPages = ceil($intNbAnimaux / $nbAnimauxPerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbAnimauxPerPage;

    $recupAllAnimaux = $db->callProcedure("recupAllAnimauxTypeAnimal", [$nbAnimauxPerPage, $param, $_GET['typeAnimal']]);
} else {
    $nbAnimauxPerPage = 3;
    $checkNbAnimaux = $db->callProcedure("checkNbAnimaux");
    $intNbAnimaux = intval($checkNbAnimaux{0}[0]);
    $nbPages = ceil($intNbAnimaux / $nbAnimauxPerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }

    $param = ($numPage - 1) * $nbAnimauxPerPage;

    $recupAllAnimaux = $db->callProcedure("recupAllAnimaux", [$nbAnimauxPerPage, $param]);
}
