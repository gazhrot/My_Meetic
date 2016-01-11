<?php
session_start();

require_once('../dbFunction.php');

$connect = new User();

if ($connect->isNotEmpty($_POST) == true) {

	$_SESSION['pseudo'] = $_POST['login'];
	$connect->connection($_POST['login'], $_POST['password']);
}

?>