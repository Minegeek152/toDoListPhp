<?php
require('../classes/Connection.php');
require('../utils.php');
require("../gateway/TacheGateWay.php");
require("../classes/Tache.php");

$id = $_GET['identifiant'];

try{
$tgw = new TacheGateWay(new Connection($dns, $user,$pass));
$tache = $tgw->findById($id);
echo $tache; /* regler ce probleme*/
}
catch( PDOException $Exception ) {
	/*echo 'erreur';
	echo $Exception->getMessage();*/
	header('Location : http://berlin.iut.local/~lolabussie/toDoListPhp/vues/erreur.php');
	exit;
}
?>
