<?php
session_start();
require_once('../dbFunction.php');
$searchGenre = new User();
if (isset($_GET['searchGenre']) || isset($_GET['localisation'])) {
	$searchGenre->searchGenre($_GET['searchGenre'], $_GET['localisation']);
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
<a href="panel_user.php">Acceder a mon Profil</a>
<a href="messagerie.php">Acceder a mes messages.</a>
<a href="deconnection.php">Se deconnecter</a>
<form method="GET" action="accueil.php">
	<p>Rechercher par genre</p>
	<select name="searchGenre" id="searchGenre">
		<option></option>
		<option value="homme">Homme</option>
		<option value="femme">Femme</option>
		<option value="animal">Animal</option>
	</select>
	<p>par localisation</p>
	<input type="text" name="localisation" id="localisation">
	<!-- <p>par tranche d'age</p>
	<select name="age" id="age">
		<option value="">18 / 25 ans</option>
		<option value="">25 / 35 ans</option>
		<option value="">35 / 45 ans</option>
		<option value="">45 ans et +</option>
	</select>
	 --><button type="submit">Rechercher</button>
</form>
<table>
		<thead>
			<tr>
				<th>Pseudo</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Birthday</th>
				<th>Genre</th>
				<th>Ville</th>
				<th>Acceder a son Profil</th>
			</tr>
		</thead>
		<?php for ($i=0; $i < count($searchGenre->result); $i++): ?>
		<tbody>
		<?php $_SESSION['message_receiver'] = $searchGenre->result[$i][7]; ?>			
			<th><?php echo $searchGenre->result[$i][7]; ?></th>
			<th><?php echo $searchGenre->result[$i][1]; ?></th>
			<th><?php echo $searchGenre->result[$i][2]; ?></th>
			<th><?php echo $searchGenre->result[$i][3]; ?></th>
			<th><?php echo $searchGenre->result[$i][4]; ?></th>
			<th><?php echo $searchGenre->result[$i][5]; ?></th>
			<th><a href="messagerie.php?id_membre=<?php echo urlencode($searchGenre->result[$i][7]); ?>">envoyer un message</a></th>
		<?php endfor; ?>
		</tbody>
	</table>
</body>
</html>