<?php
require('../modele/Connection.php');
require('../utils.php');
require("../gateway/TacheGateWay.php");
require("../modele/Tache.php");

$intitule = $_GET['intitule'];

try{
	$tgw = new TacheGateWay(new Connection($dsn, $user,$pass));
	$taches = $tgw->newTache($intitule);
	Foreach ($taches as $row)
		echo $row.'<br/>';
}
catch( PDOException $Exception ) {
	echo 'erreur';
	echo $Exception->getMessage();
}
?>
