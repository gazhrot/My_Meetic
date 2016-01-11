<?php

require_once('../dbFunction.php');
$validateur = new User();
$validateur->validation($_GET['pseudo'], $_GET['cle']);

if ($validateur->validation($_GET['pseudo'], $_GET['cle']) === true) {
	if (true === $validateur->verifUser($_GET['pseudo'])) {
		
		header('location: do_profil.php?pseudo='.urlencode($_GET['pseudo']).'');
	}
}