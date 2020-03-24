<?php

include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$_SESSION['idDemande'] = $_POST['buttonDemande'];


$checkAssocDemande = $db->callProcedure('checkAssocDemande', [$idAssoc, $_SESSION['idDemande']]);

if (empty($checkAssocDemande)) {
    $pasOk = 'PasSaDemande';
    echo $pasOk;
} else {
    $recupOneDemande = $db->callProcedure('recupOneDemande', [$_SESSION['idDemande']]);
}
