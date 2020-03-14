<?php

include 'dbAccess.php';

$db = new dbAccess();

$nbAssocPerPage = 3;
$checkNbAssoc = $db->callProcedure("checkNbAssoc");
$intNbAssoc = intval($checkNbAssoc{0}[0]);
$nbPages = ceil($intNbAssoc / $nbAssocPerPage);


if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
    $numPage = $_GET['p'];
} else {
    $numPage = 1;
}
echo $numPage;

$param = ($numPage - 1) * $nbAssocPerPage;

$recupAllAssoc = $db->callProcedure("recupAllAssoc", [$nbAssocPerPage, $param]);

if (empty($recupAllAssoc)) {
    echo "mdpPasOk";
} else {
    //var_dump($checkNbAssoc);
}
