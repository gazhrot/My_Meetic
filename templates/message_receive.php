<?php
session_start();
require_once('../dbFunction.php');
$getReceiveMessage = new User();
if (isset($_SESSION['pseudo'])) {
	$getReceiveMessage->getReceiveMessage($_SESSION['pseudo']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Meetic</title>
</head>
<body>
<p>Bonjour <?php echo $_SESSION['pseudo'];?> voici vos message recut</p>
<a href="accueil.php">retourner a l'accueil.</a>
<a href="message_send.php">consulter mes message envoyer</a>
<table>
		<thead>
			<tr>
				<th>id_message</th>
				<th>message</th>
				<th>date_message</th>
				<th>id_user_receiver</th>
				<th>id_user_sender</th>
			</tr>
		</thead>
		<?php for ($i=0; $i < count($getReceiveMessage->result); $i++): ?>
		<tbody>
			<th><?php echo $getReceiveMessage->result[$i][0]; ?></th>
			<th><?php echo $getReceiveMessage->result[$i][1]; ?></th>
			<th><?php echo $getReceiveMessage->result[$i][2]; ?></th>
			<th><?php echo $getReceiveMessage->result[$i][3]; ?></th>
			<th><?php echo $getReceiveMessage->result[$i][4]; ?></th>
		<?php endfor; ?>
		</tbody>
	</table>
</body>
</html>