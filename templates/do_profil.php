<?php

require_once('../dbFunction.php');

$_SESSION['pseudo'] = $_GET['pseudo'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>My Meetic</title>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<p id="prev">Precedent</p>
<form id="profil" method="POST" action="../insertProfil.php">
<ul class="slideBox">
<li><div id="accueil">
	<p>Bienvenue sur My_Meetic <?php echo ucwords($_SESSION['pseudo']); ?></p>
	<p>on a tres envie d'en savoir plus sur vous...</p>
	<p>completez votre profil en 5 minutes: une surprise vous attends.</p>
	<p>sachez que plus vous vous devoilez, plus vous serez recompenser.</p>
</div></li>
<li><div id="a1">
	<p>Etes vous pret a vous engager dans une relation ?</p>
	<select name="statut_relation">
		<option value="oui">Oui</option>
		<option value="non">Non</option>
		<option value="notyet">Pas encore</option>
	</select>
</div></li>
<li><div id="a2" style="overflow:hidden;">
	<p>Quel est votre statut marital ?</p>
	<select name="statut_marital">
		<option value="celibataire">celibataire</option>
		<option value="voeuf">voeuf</option>
		<option value="marier">marier</option>
	</select>
</div></li>
<li><div id="a3" style="overflow:hidden;">
	<p>Etes vous parent ?</p>
	<select name="statut_parent">
		<option value="oui">Oui</option>
		<option value="non">Non</option>
	</select>
</div></li>
<li><div id="a4">
	<p>Avez vous envie d'avoir des enfant ?</p>
	<select name="statut_enfant">
		<option value="oui">Oui</option>
		<option value="non">Non</option>
		<option value="notyet">A reflechir</option>
	</select>
</div></li>
<li><div id="a5">
	<p>Quel est votre niveau d'etudes</p>
	<select name="statut_etudes">
		<option value="cap-bep">CAP / BEP</option>
		<option value="bac">BAC</option>
		<option value="bac++">BAC + X</option>
	</select>
</div></li>
<li><div id="a6">
	<p>Quel taille faites vous ?</p>
	<input type="number" name="statut_taille" min="100" max="220" placeholder="174cm"/> cm
</div></li>
<li><div id="a7">
	<p>Votre silhouette est plutot ?</p>
	<select name="statut_silhouette">
		<option value="svelte">Svelte</option>
		<option value="sportive">Sportive</option>
		<option value="gros">Gros</option>
	</select>
</div></li>
<li><div id="a8">
	<p>Et votre longueur de cheveux dans tout ca ?</p>
	<select name="statut_longcheveux">
		<option value="court">court</option>
		<option value="long">long</option>
		<option value="rase">rase</option>
		<option value="chauve">chauve</option>
	</select>
</div></li>
<li><div id="a9">
	<p>Cote couleur vous etes ?</p>
	<select name="statut_couleurcheveux">
		<option value="brun">brun</option>
		<option value="blond">blond</option>
		<option value="noir">noir</option>
		<option value="autre">autre</option>
	</select>
</div></li>
<li><div id="a10">
	<p>De quel origine etes vous ?</p>
	<select name="statut_origine">
		<option value="europeene">Europeene</option>
		<option value="africaine">Africaine</option>
		<option value="etc">etc</option>
	</select>
</div></li>
<li><div id="a11">
	<p>Quel est votre Nationalite ?</p>
	<select name="statut_nationalite">
		<option value="europeene">Europeene</option>
		<option value="africaine">Africaine</option>
		<option value="etc">etc</option>
	</select>
</div></li>
<li><div id="a12">
	<p>Quel est votre religion ?</p>
	<select name="statut_religion">
		<option value="catholique">catholique</option>
		<option value="musulman">musulman</option>
		<option value="athee">athee</option>
	</select>
</div></li>
<li><div id="a13">
	<p>Vous fumer ?</p>
	<select name="statut_fumer">
		<option value="oui">Oui</option>
		<option value="non">Non</option>
	</select>
</div></li>
<li><div id="a14">
	<p>Vous avez une imperfection ?</p>
	<input type="text" name="statut_imperfection" placeholder="Je ronfle.." />
</div></li>
<li><div id="a15">
	<p>Quels sont vos petites manies ?</p>
	<input type="text" name="statut_manies" placeholder="je suis bordelique.."/>
</div></li>
<li><div id="a16">
	<p>Montrer votre plus beau sourir !</p>
	<input type="file" name="avatar" />
</div></li>
<li><div id="a17">
	<p>Et maintenant distinguer vous avec une annonce !</p>
	<textarea type="text" name="statut_annonce" placeholder"Une petite description de vous.."></textarea>
	<button type="submit">Acceder au Site</button>
</div></li>
</ul>
</form>
<p id="next">Suivant</p>
<!-- 
- ETES VOUS PRET A VOUS ENGAGER DANS UNE RELATION 
- QUEL EST VOTRE STATUT MARITAL
- ETES VOUS PARENT 
- ENVIE D'ENFANT
- QUEL EST VOTRE NIVEAU D'ETUDES
- QUEL TAILLE FAITES VOUS 
- VOTRE SILHOUETTE EST PLUTOT 
- ET VOTRE LONGUEUR DE CHEVEUX DANS TOUT CA
- COTER COULEUR VOUS ETES
- DE QUEL ORIGINE ETES VOUS
- QUEL EST VOTRE NATIONALITE
- QUEL EST VOTRE RELIGION
- VOUS FUMER
- VOUS AVEZ UNE IMPERFECTION 
- QUELS SONT VOS PETITES MANIES
- MONTRER VOTRE PLUS BEAU SOURIR
- ET MAINTENANT DISTINGUER VOUS AVEC UNE ANNONCE
-->
<script src="../js/animate.js"></script>
</body>
</html>