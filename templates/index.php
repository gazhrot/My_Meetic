<?php 
require_once('../dbFunction.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>My Meetic</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="test">
<div id="inscription">
	<form id="searchForm" method="POST" action="goInscription.php">
		<p>Sexe</p>
		<select name="sexe">
			<option value="default" id="default">Choisir</option>
			<option value="homme" id="homme">Homme</option>
			<option value="femme" id="femme">Femme</option>
			<option value="animal" id="animal">Animal</option>
		</select>
		<p>Date de Naissance</p>
		<input type="date" id="birthday" name="birthday" placeholder="21/10/1995" />
		<p>Pays de residence</p>
		<select id="pays" name="pays">
			<option>Mon pays</option>
		</select>
		<p>Localisation</p>
		<input id="cpostal" type="text" name="cpostal" placeholder="Code postal" />
		<select id="ville" name="ville">
			<option>Selectionner une ville</option>
		</select>
		<p>Nom</p>
		<input type="text" id="nom" name="nom" placeholder="Bruneaux" />
		<p>Prenom</p>
		<input type="text" id="prenom" name="prenom" placeholder="Axel" />
		<p>Pseudo</p>
		<input id="pseudo" type="text" name="pseudo" placeholder="Ex: Axel, Jordan..." />
		<p>Adresse email</p>
		<input id="email" type="email" name="email" placeholder="Ex: Jordan@gmail.com" />
		<p>Mot de passe</p>
		<input id="password" type="password" name="password" placeholder="8 caracteres minimum" />
		</br>
		<input id="checkbox" type="checkbox" />
		<p>Je certifie être majeur(e), j’ai lu et j’accepte les CGU des services My_Meetic. J’accepte que l’information relative à mon orientation sexuelle soit traitée par My_Meetic afin de me fournir ses services.</p>
		<button id="submit" type="submit">CREER MON PROFIL</button>
		<p>En cliquant sur “Creer mon profil” vous acceptez la politique sur la vie privée, la charte d’utilisation des cookies de My_Meetic et des services décrits.</p>
	</form>
		<button><a href="connection.php">J'ai deja un compte</a></button>
</div>
</div>
<div id="result"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../js/app_ajax.js"></script>
</body>
</html>