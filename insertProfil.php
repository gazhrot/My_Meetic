<?php
session_start();
require_once('dbFunction.php');

$updateProfil = new User();

if (true === $updateProfil->isNotEmpty($_POST)) {

	$updateProfil->insertProfil($_POST['statut_marital'], $_POST['statut_parent'], $_POST['statut_enfant'], $_POST['statut_etudes'], $_POST['statut_taille'], $_POST['statut_silhouette'], $_POST['statut_longcheveux'], $_POST['statut_couleurcheveux'], $_POST['statut_origine'], $_POST['statut_nationalite'], $_POST['statut_religion'], $_POST['statut_fumer'], $_POST['statut_imperfection'], $_POST['statut_manies'], $_POST['avatar'], $_POST['statut_relation'], $_POST['statut_annonce'], $_SESSION['pseudo']);
	if (true === $updateProfil->verifUser($_SESSION['pseudo'])) {
		header('location: templates/accueil.php');
	}
}

