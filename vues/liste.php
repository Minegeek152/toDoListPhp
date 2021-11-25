<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Liste</title>
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

<h2 class="petit_titre">Nom de la liste
<?php 
//on recupere le nom de la liste selectionnée et on l'affiche dans le titre
?>
</h2>

<div id="modif">
<form  action="../validerListe.php" method="GET">
<input type="text" id="nom" name="nom" required />
<input type="submit" value="Modifier le nom de la liste" />
</form>
</div>
<div id="supp">
<button type="button">Supprimer la liste</button>
</div>

<div id="les_taches">
<?php
//on recupere les taches de la liste sélectionnée et on les affiches
?>
</div>

<div id="gauche">
<aside>
<form class="gerer" action="../valider/validerTache.php" method="GET">
<p>
<label for="intitule">Ajouter une t&acirc;che : </label> 
<input type="text" id="intitule" name="intitule" required />
</p>
<input type="submit" value="Ajouter" />
</form>
</aside>
</div>
</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>
