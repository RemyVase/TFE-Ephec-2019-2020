<?php

session_start();

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = $_POST['pseudoAjout'];

$checkSiDejaDansAssoc = $db->callProcedure('checkSiDejaDansAssoc', [$pseudo]);

if($checkSiDejaDansAssoc[0]{'id_assoc'} === null){
    $ajoutMembre = $db->callProcedure('ajoutMembreAssoc',[$pseudo,$_SESSION['idAssoc']]);
}
else{
    echo json_encode("UserDejaDansUneAssoc");
}