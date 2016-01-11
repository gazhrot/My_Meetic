<?php
class dbConnect
{
	function __construct(){
		require_once('config.php');
		try {
			$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, DB_PASS);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function Close() {
		$db = null;
	}
}
?>