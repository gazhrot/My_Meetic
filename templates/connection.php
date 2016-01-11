<?php

if(session_id()==""){
	session_start();
}
	
	if(!empty($_SESSION))
	{
		if(isset($_SESSION['id']))
		{
			header('Location: accueil.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>My Meetic</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div>
	<form method="POST" action="connect.php">
		<p>Pseudo ou Email</p>
		<input type="text" id="pseudo" name="login" placeholder="Jordan@gmail.com"/>
		<p>Mot de passe</p>
		<input type="password" name="password" />
		<button type="submit" id="submit">Se connecter</button>
	</form>
		<a href="index.php">Je n'ai pas encore de compte !</a>
</div>
</body>
</html>