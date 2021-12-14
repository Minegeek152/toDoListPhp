<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Nouvelle_Liste</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<header>
<div class="tete">
<h1 class="titre">What To Do ?</h1>
</div>
<nav class="le_menu">
<ul class="nav nav-tabs">
<li class="nav-item active"> <a class="nav-link" href="accueil.php">Accueil</a> </li>
<li class="nav-item"> <a class="nav-link" href="seconnecter.php">Se connecter</a> </li>
<li class="nav-item"> <a class="nav-link" href="nouvelleListe.php">Cr&eacute;er une liste</a></li>
<li class="nav-item"> <a class="nav-link" href="rechercheListe.php">Rechercher une liste</a></li>
</ul>
</nav>
</header>
<div class="ventre">

<h2 class="petit_titre">Cr&eacute;er une liste</h2>

<div class="formulaire">
<form action="index.php?action=ajouterlistepublique" method="post">
<p>
<label for="nom"> Nom de la liste :</label> 
<input type="text" id="nom" name="nom" required />
</p>
<input class="voir_liste" type="submit" value="Valider" />
</form>
</div>
</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>