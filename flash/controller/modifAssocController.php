<?php
session_start();
include 'dbAccess.php';

$db = new dbAccess();

$idAssoc = $_SESSION['idAssoc'];
$nom = htmlspecialchars($_POST["nomAssocModif"]);
$adresse = htmlspecialchars($_POST["adresseAssocModif"]);
$email = htmlspecialchars($_POST["emailAssocModif"]);
$tel = htmlspecialchars($_POST["telAssocModif"]);
$site = htmlspecialchars($_POST["siteAssocModif"]);
$desc = htmlspecialchars($_POST["descAssocModif"]);
$face = htmlspecialchars($_POST["facebookAssocModif"]);
$insta = htmlspecialchars($_POST["instagramAssocModif"]);
$placeQuar = htmlspecialchars($_POST["placesQuarantaineAssocModif"]);
$placeReg = htmlspecialchars($_POST["placesReglesAssocModif"]);

$modifAssoc = $db->callProcedure('modifAssoc', [$idAssoc, $nom, $adresse, $email, $tel, $site, $desc, $face, $insta, $placeQuar, $placeReg]);