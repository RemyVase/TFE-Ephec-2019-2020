<?php

include 'dbAccess.php';

$db = new dbAccess();

$mail = $_POST["emailUserOubli"];

$checkMail = $db->callProcedure("checkMail", [$mail]);

if (empty($checkMail)) {
    echo json_encode("mailPasOk");
} else {
    $token = md5(random_bytes(10));
    $addToken = $db->callProcedure("addTokenReset", [$mail, $token]);
    $to = $_POST["emailUserOubli"];
    $subject = "Nouveau mot de passe";

    $message = "<b>Jeton pour changer de mot de passe : </b> : <i>" . $token . "</i>";

    $header = "From:sapandfriends@hotmail.com \r\n";
    $header .= "Cc:sapandfriends \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);

    if ($retval == true) {
        echo json_encode("success");
    } else {
        echo json_encode("Message could not be sent...");
    }
}
