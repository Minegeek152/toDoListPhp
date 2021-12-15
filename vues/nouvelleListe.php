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

<div>
<div class="p-3 mb-2 bg-success text-white">
<div class="d-flex justify-content-center">
<h1 class="display-6">What To Do ?</h1>
</div>

<div class="d-flex justify-content-center">
<nav>
<ul class="nav nav-tabs">
<li class="nav-item"> <a class="nav-link" style="color : white;" href="<?=$rep.vues['accueil']?>">Accueil</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="seconnecter.php">Se connecter</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?action=ajouterlistepublique">Cr&eacute;er une liste</a></li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="rechercheListe.php">Rechercher une liste</a></li>
</ul>
</nav>
</div>
</div>
</div>
</header>
<div class="ventre">

<div class="d-flex justify-content-center">
<h2 class="petit_titre">Cr&eacute;er une liste</h2>
</div>

<div class="d-flex justify-content-center">
<form action="index.php?action=ajouterlistepublique" method="post">
<p>
<label for="nom"> Nom de la liste :</label> 
<input type="text" id="nom" name="nom" required />
</p>
<button class="btn btn-success" type="submit" id="nouvliste" name="nouvliste" >Valider</button>
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