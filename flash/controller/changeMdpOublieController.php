<?php

include 'dbAccess.php';

$db = new dbAccess();
$mail = htmlspecialchars($_POST["emailUserOubliChange"]);
$token = htmlspecialchars($_POST["jetonUserOubliChange"]);
$password = hash("sha256", htmlspecialchars($_POST["mdpUserOubliChange"]));

$recupTokenUser = $db->callProcedure('recupTokenOubli', [$mail]);

if($token === $recupTokenUser[0]['tokenReset']){
    $changeMdp = $db->callProcedure('changePasswordOubli',[$mail, $password]);
    echo json_encode("succes");
}else{
    echo json_encode("echec");
}