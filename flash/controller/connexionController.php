<?php

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = $_POST["connPseudoUser"];
$password = $_POST["connPasswordUser"];

//$checkEmail = $db->callProcedure("checkMail", [$pseudo]);
//$checkPseudo = $db->callProcedure("checkPseudo", [$pseudo]);
$checkPseudoPassword = $db->callProcedure("pseudoPassword", [$pseudo, $password]);

if (empty($checkPseudoPassword)) {
    echo json_encode("mdpPasOk");
} else{
    echo json_encode("GOOOOOOOO");
}
