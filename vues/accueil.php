<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Acceuil</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
</head>

<body>
<header>
<div class="tete">
<h1 class="titre">What To Do ?</h1>
</div>
<nav class="le_menu">
<ul>
<li class="menu"> <a href="acceuil.php">Acceuil</a> </li>
<li class="menu"> <a href="seconnecter.html">Se connecter</a> </li>
<li class="menu"> <a href="nouvelleTache.html">Creer une tache</a></li>
<li class="menu"> <a href="rechercheTache.html">Rechercher une tache</a></li>
</ul>
</nav>
</header>
<div class="ventre">

<h2 class="petit_titre">Listes des taches</h2>



<?php
require('../modele/Connection.php');
require('../utils.php');
require("../gateway/TacheGateWay.php");

try{
$tgw = new TacheGateWay(new Connection($dsn, $user,$pass));
$tgw->showTaches();
}
catch( PDOException $Exception ) {
echo 'erreur';
echo $Exception->getMessage();
}
?>

</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>
