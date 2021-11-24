<?php
require('../modele/Connection.php');
require('../utils.php');
require("../gateway/TacheGateWay.php");
require("../modele/Tache.php");

$id = $_GET['identifiant'];

try{
$tgw = new TacheGateWay(new Connection($dns, $user,$pass));
$tache = $tgw->findById($id);
echo $tache; /* regler ce probleme*/
}
catch( PDOException $Exception ) {
echo 'erreur';
echo $Exception->getMessage();
}
?>
