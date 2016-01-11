<?php

require_once('dbFunction.php');

$truc = new DbFunction();
return $truc->cPostal($_POST['cpostal']);
