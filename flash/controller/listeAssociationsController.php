<?php

include 'dbAccess.php';

$db = new dbAccess();

if (isset($_GET['typeAnimal'])) {
    $nbAssocPerPage = 3;
    $checkNbAssoc = $db->callProcedure("checkNbAssocTypeAnimal",[$_GET['typeAnimal']]);
    $intNbAssoc = intval($checkNbAssoc{0}[0]);
    $nbPages = ceil($intNbAssoc / $nbAssocPerPage);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }
    
    $param = ($numPage - 1) * $nbAssocPerPage;

    $recupAllAssoc = $db->callProcedure("recupAllAssocTypeAnimal", [$nbAssocPerPage, $param, $_GET['typeAnimal']]);
} else{
    $nbAssocPerPage = 3;
    $checkNbAssoc = $db->callProcedure("checkNbAssoc");
    $intNbAssoc = intval($checkNbAssoc{0}[0]);
    $nbPages = ceil($intNbAssoc / $nbAssocPerPage);
    
    
    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
        $numPage = $_GET['p'];
    } else {
        $numPage = 1;
    }
    
    $param = ($numPage - 1) * $nbAssocPerPage;
    
    $recupAllAssoc = $db->callProcedure("recupAllAssoc", [$nbAssocPerPage, $param]);
}
