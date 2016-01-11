<?php 

require_once('../dbFunction.php');

$update = new User();
if (true === $update->isNotEmpty($_POST)) {
	$update->updateProfil($_POST['avatar'], $_POST['adresse'], $_POST['email'], $_POST['password'], $_POST['statut_marital'], $_POST['statut_relation'], $_POST['statut_parent'], $_POST['statut_enfant'], $_POST['statut_etudes'], $_POST['statut_taille'], $_POST['statut_silhouette'], $_POST['statut_longcheveux'], $_POST['statut_couleurcheveux'], $_POST['statut_origine'], $_POST['statut_nationalite'], $_POST['statut_religion'], $_POST['statut_fumer'], $_POST['statut_imperfection'], $_POST['statut_manies'], $_POST['statut_annonce']);
	header('location: accueil.php');
}
