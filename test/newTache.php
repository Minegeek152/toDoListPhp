<?php
require('../modele/Connection.php');
require('../utils.php');
require("../modele/Tache.php");
require("../gateway/TacheGateWay.php");

$intitule = $_GET['intitule'];

try{
	$tgw = new TacheGateWay(new Connection($dns, $user,$pass));
	$tgw->newTache($intitule,1);
	
}
catch( PDOException $Exception ) {
	echo('erreur');
	echo $Exception->getMessage();
	/*header('Location : http://berlin.iut.local/~lolabussie/toDoListPhp/vues/erreur.php?message=');
	exit;*/
}
?>
