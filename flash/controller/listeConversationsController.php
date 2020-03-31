<?php
include 'dbAccess.php';

$db = new dbAccess();

$recupAllConversation = $db->callProcedure('messageRecupAllConversations',[$_SESSION['idAssoc']]);