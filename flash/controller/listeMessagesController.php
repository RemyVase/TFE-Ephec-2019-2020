<?php

include 'dbAccess.php';

$db = new dbAccess();

$recupAllMessage = $db->callProcedure('messageRecupAllMessage',[$_POST['data']]);
echo json_encode($recupAllMessage);