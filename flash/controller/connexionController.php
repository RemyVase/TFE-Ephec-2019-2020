<?php
session_start();

include 'dbAccess.php';

$db = new dbAccess();

$pseudo = $_POST["connPseudoUser"];
$password = crypt($_POST["connPasswordUser"]);

//$checkEmail = $db->callProcedure("checkMail", [$pseudo]);
//$checkPseudo = $db->callProcedure("checkPseudo", [$pseudo]);
$checkPseudoPassword = $db->callProcedure("connexionUser", [$pseudo, $password]);
if (empty($checkPseudoPassword)) {
    echo json_encode("mdpPasOk");
} else {
    $_SESSION['id'] = $checkPseudoPassword[0]{'id_user'};
    $_SESSION['pseudo'] = $checkPseudoPassword[0]{'pseudo_user'};
    $_SESSION['mail'] = $checkPseudoPassword[0]{'mail_user'};
    $_SESSION['date'] = $checkPseudoPassword[0]{'date_user'};
}
