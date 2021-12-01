<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Acceuil</title>
<link href= "../vues/to_do.css" rel="stylesheet" media="screen" type="text/css">
</head>

<body>
<header>
<div class="tete">
<h1 class="titre">What To Do ?</h1>
</div>
<nav class="le_menu">
<ul>
<li class="menu"> <a href="accueil.html">Accueil</a> </li>
<li class="menu"> <a href="seconnecter.html">Se connecter</a> </li>
<li class="menu"> <a href="nouvelleListe.html">Cr&eacute;er une liste publique</a></li>
<li class="menu"> <a href="rechercheListe.html">Rechercher une liste</a></li>
<ul class="connecte">
<li class="menu"> <a href="nouvelleListe.html">Cr&eacute;er une liste privée</a></li>
</ul>
</ul>
</nav>
</header>
<div class="ventre">

<h2 class="petit_titre">Listes de t&acirc;ches</h2>

<p>
<a href="affichageListe.html">voir une liste</a>
</p>

<h2 class="petit_titre">
	<?php 
	foreach ($taches as $row) {

    if($row->isComplete()){
      $complete='oui';
    }
    else{
      $complete='non';
    }
    echo 'id tache : '.$row->getIdTache().' nom : '.$row->getIntitule().'   fait? : '.$complete.'  Dans liste : '.$row->getIdListe().'<br/>';
}?>
</h2>

</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>
