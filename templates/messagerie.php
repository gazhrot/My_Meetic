<?php
session_start();
if (isset($_GET['id_membre'])) {
	$_SESSION['id_message_receiver'] = urldecode($_GET['id_membre']);	
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
<p>Bonjour <?php echo $_SESSION['pseudo'];?></p>
<a href="accueil.php">retourner a l'accueil.</a>
<a href="message_receive.php">consulter mes message recut</a>
<a href="message_send.php">consulter mes message envoyer</a>

<?php if (isset($_SESSION['id_message_receiver'])): ?>
<p>vous pouvez envoyer un message a <?php echo $_SESSION['id_message_receiver']; ?></p>
<form action="send_message.php" method="POST">
	<p>Message</p>
	<textarea name="message" alt='message' placeholder='Votre message ici..'></textarea>
	<button type="submit">envoyer</button>
</form>
<?php endif;?>
</body>
</html>