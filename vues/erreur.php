<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Erreur</title>
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

<h2 class="petit_titre">Erreur :(</h2>

<?php

if(!isset($_GET['message'])){
	echo = "erreur, aucun message à afficher"
} else $message = $_GET['message'];

echo $message;
?>


</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>
