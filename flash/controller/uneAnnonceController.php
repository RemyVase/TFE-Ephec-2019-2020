<?php

include 'dbAccess.php';

$db = new dbAccess();

$idUser = $_SESSION['id'];
$_SESSION['idAnnonce'] = $_POST['buttonOffre'];

$checkUserAnnonce = $db->callProcedure('checkUserAnnonce', [$idUser, $_SESSION['idAnnonce']]);

$recupOneAnnonce = $db->callProcedure('recupOneAnnonce', [$_SESSION['idAnnonce']]);