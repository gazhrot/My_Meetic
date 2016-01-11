<?php
session_start();
require_once('../dbFunction.php');
$showProfil = new User();
$showProfil->getProfil($_SESSION['pseudo']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>My Meetic</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<a href="delete_account.php">Supprimer definitivement mon compte</a>
<a href="accueil.php">Retour a l'accueil.</a>
<form action="update_profil.php" method="POST">
	<p>avatar :</p>
	<input type="file" name="avatar" value="<?php echo $showProfil->avatar ?>" />
	<p>adresse :</p>
	<input type="text" name="adresse" value="<?php echo $showProfil->adresse ?>"/>
	<p>email :</p>
	<input type="email" name="email" value="<?php echo $showProfil->email ?>"/>
	<p>password :</p>
	<input type="password" name="password" value="<?php echo $showProfil->password ?>"/>
	<p>statut marital :</p>
	<input type="text" name="statut_marital" value="<?php echo $showProfil->statut_marital ?>" />
	<p>statut relation :</p>
	<input type="text" name="statut_relation" value="<?php echo $showProfil->statut_relation ?>" />
	<p>statut parent :</p>
	<input type="text" name="statut_parent" value="<?php echo $showProfil->statut_parent ?>" />
	<p>statut enfant :</p>
	<input type="text" name="statut_enfant" value="<?php echo $showProfil->statut_enfant ?>" />
	<p>statut etudes :</p>
	<input type="text" name="statut_etudes" value="<?php echo $showProfil->statut_etudes ?>" />
	<p>statut taille :</p>
	<input type="text" name="statut_taille" value="<?php echo $showProfil->statut_taille ?>" />
	<p>statut silhouette :</p>
	<input type="text" name="statut_silhouette" value="<?php echo $showProfil->statut_silhouette ?>" />
	<p>statut longcheveux :</p>
	<input type="text" name="statut_longcheveux" value="<?php echo $showProfil->statut_longcheveux ?>" />
	<p>statut couleurcheveux :</p>
	<input type="text" name="statut_couleurcheveux" value="<?php echo $showProfil->statut_couleurcheveux ?>" />
	<p>statut origine :</p>
	<input type="text" name="statut_origine" value="<?php echo $showProfil->statut_origine ?>" />
	<p>statut nationalite :</p>
	<input type="text" name="statut_nationalite" value="<?php echo $showProfil->statut_nationalite ?>" />
	<p>statut religion :</p>
	<input type="text" name="statut_religion" value="<?php echo $showProfil->statut_religion ?>" />
	<p>statut fumer :</p>
	<input type="text" name="statut_fumer" value="<?php echo $showProfil->statut_fumer ?>" />
	<p>statut imperfection :</p>
	<input type="text" name="statut_imperfection" value="<?php echo $showProfil->statut_imperfection ?>" />
	<p>statut manies :</p>
	<input type="text" name="statut_manies" value="<?php echo $showProfil->statut_manies ?>" />
	<p>statut annonce :</p>
	<input type="text" name="statut_annonce" value="<?php echo $showProfil->statut_annonce ?>" />
	<button type="submit">Mettre a Jour mon profil.</button>
</form>
</body>
</html>