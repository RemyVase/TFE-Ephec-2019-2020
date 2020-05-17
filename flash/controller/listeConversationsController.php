<?php
include 'dbAccess.php';

$db = new dbAccess();

if (empty($_SESSION['idAssoc'])) {
    $recupAllConversation = $db->callProcedure('messageRecupAllConversationsUser', [$_SESSION['id']]);
} else {
    $checkAssocConv = $db->callProcedure('messageCheckAssocConv',[$_SESSION['idAssoc']]);
    $checkUserConv = $db->callProcedure('messageCheckUserConv2',[$_SESSION['id']]);
    if (empty($checkAssocConv)) {
        $recupAllConversation = $db->callProcedure('messageRecupAllConversationsUser', [$_SESSION['id']]);
    } elseif (empty($checkUserConv)) {
        $recupAllConversation = $db->callProcedure('messageRecupAllConversationsAssoc', [$_SESSION['idAssoc']]);
    } else {
        $recupAllConversation = $db->callProcedure('messageRecupAllConversAssocUser', [$_SESSION['idAssoc'], $_SESSION['id']]);
    }
}

