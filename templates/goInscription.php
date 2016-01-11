<?php

require_once('../dbFunction.php');

$newUser = new User();
if (true === $newUser->isNotEmpty($_POST)) {
	// 1 = pseudo deja existant, 2 = email deja existant, 3 = email et pseudo deja existant //
	if (true === $newUser->isExist($_POST['pseudo'], $_POST['email'])) {
		if (true === $newUser->verifAge($_POST['birthday'])){
			$newUser->inscription($_POST['nom'], $_POST['prenom'], $_POST['birthday'], $_POST['sexe'], $_POST['ville'], $_POST['email'], $_POST['pseudo'], $_POST['password']);
		} else {
			echo "vous n'etes pas pret !";
			die();
		}
	} else {
		echo "Email ou Pseudo deja existant\n";
		die();
	}

$sujet 		= "activer votre compte";
$entete 	= "From: my_meetic@construction85.com";
$message 	= 'Bienvenue sur MyMeetic,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://localhost/my_meetic/templates/secure.php?pseudo='.urlencode($newUser->pseudo).'&cle='.urlencode($newUser->cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

$newUser->sendMail($_POST['email'], $sujet, $entete, $message, $_POST['pseudo'], $_POST['password']);
echo "Vous venez de recevoir un mail pour valider votre compte.";
/*header('Location: secure.php?pseudo='.urlencode($_POST['pseudo']).'');*/
} else {
	echo "Vous n'avez pas remplit tout les champs";
}