<?php
session_start();
require_once('../dbFunction.php');
$sendMessage = new User();
$sendMessage->isNotEmpty($_POST);
$sendMessage->sendMessage($_POST['message'], $_SESSION['pseudo'], $_SESSION['id_message_receiver']);
$_SESSION['id_message_receiver'] = null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Meetic</title>
</head>
<body>
<p>Votre message a bien ete envoyer !</p>
<a href="accueil.php">retourner a l'accueil</a>
<a href="message_send.php">consulter mes message envoyer</a>
<a href="message_receive.php">consulter mes message recut</a>
</body>
</html>