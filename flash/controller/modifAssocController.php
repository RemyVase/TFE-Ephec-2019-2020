<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$nom = $_POST["nomAssocModif"];
$adresse = $_POST["adresseAssocModif"];
$email = $_POST["emailAssocModif"];
$tel = $_POST["telAssocModif"];
$site = $_POST["siteAssocModif"];
$desc = $_POST["descAssocModif"];
$face = $_POST["facebookAssocModif"];
$insta = $_POST["instagramAssocModif"];
$placeQuar = $_POST["placesQuarantaineAssocModif"];
$placeReg = $_POST["placesReglesAssocModif"];

$modifAssoc = $db->callProcedure('modifAssoc', [$idAssoc, $nom, $adresse, $email, $tel, $site, $desc, $face, $insta, $placeQuar, $placeReg]);