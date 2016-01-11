<?php
require_once('../dbFunction.php');
session_start();
$delete_account = new User();
$delete_account->deleteUser($_SESSION['pseudo']);
$_SESSION = array();
session_destroy();
unset($_SESSION);
header('Location: index.php');