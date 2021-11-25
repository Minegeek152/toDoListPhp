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
<li class="menu"> <a href="accueil.php">Accueil</a> </li>
<li class="menu"> <a href="seconnecter.html">Se connecter</a> </li>
<li class="menu"> <a href="nouvelleListe.html">Cr&eacute;er une liste publique</a></li>
<li class="menu"> <a href="rechercheTache.html">Rechercher une liste</a></li>
<ul class="connecte">
<li class="menu"> <a href="nouvelleListe.html">Cr&eacute;er une liste privée</a></li>
</ul>
</ul>
</nav>
</header>
<div class="ventre">

<h2 class="petit_titre">Listes de t&acirc;ches</h2>



<?php
require('../modele/Connection.php');
require('../utils.php');
require("../modele/Tache.php");
require("../gateway/TacheGateWay.php");


try{
$tgw = new TacheGateWay(new Connection($dns, $user,$pass));
$taches = $tgw->showTaches();
foreach($taches as $i => $row)
	echo $taches[$i].'<br/>';
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
