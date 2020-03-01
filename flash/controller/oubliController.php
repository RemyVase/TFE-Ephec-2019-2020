<?php

include 'dbAccess.php';

$db = new dbAccess();

$mail = $_POST["emailUserOubli"];

$checkMail = $db->callProcedure("checkMail", [$mail]);

if (empty($checkMail)) {
    echo json_encode("mailPasOk");
} else {

    $to = $_POST["emailUserOubli"];
    $subject = "Nouveau mot de passe";

    $message = "<b>Nouveau mot de passe</b> : ". rand(999, 99999999999);

    $header = "From:chaton@hotmail.com \r\n";
    $header .= "Cc:... \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);

    if ($retval == true) {
        echo json_encode("Message sent successfully...");
    } else {
        echo json_encode("Message could not be sent...");
    }
}
