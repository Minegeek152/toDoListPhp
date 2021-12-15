<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Liste</title>
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
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?action=">Accueil</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?action=seconnecter">Se connecter</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?action=ajouterlistepublique">Cr&eacute;er une liste</a></li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?action=rechercherliste">Rechercher une liste</a></li>
</ul>
</nav>
</div>
</div>
</div>
</header>


<div class="ventre">

<div class="d-flex justify-content-center">
<h2 class="petit_titre"><?=$nom_liste?></h2>
</div>

<form action="index.php?action=modifierliste" method="POST">
<div class="input-group mb-3">
  <input type="text" class="form-control" id="nouv_nom" name="nouv_nom" placeholder="Modifier le nom de la liste"/>
  <input type="hidden" id="nom_liste" name="nom_liste" value="<?=$nom_liste?>"/> 
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Valider</button>

</div>
</form>
<div class="d-flex justify-content-center">
<div id="les_taches">
<ul>
<?php
	foreach($taches as $unetache){
		if($unetache->isComplete()){
		$complete='done';
		}
		else $complete ='not done yet';
    		?>
		<li><?=$unetache->getIntitule().'	->	'.$complete?></li>
	<?php 
		} 
	?>
<ul>
</div>
</div>

<div class="d-flex justify-content-center">
<form action="index.php?action=ajoutertache" method="POST">
<div class="input-group mb-3">
  <input type="text" class="form-control" id="nouv_tache" name="nouv_tache" placeholder="Ajouter une nouvelle tâche"/>
  <input type="hidden" id="nom_liste" name="nom_liste" value="<?=$nom_liste?>"/>  
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Valider</button>
</div>
</form>
</div>

<div class="d-flex justify-content-center">
<form action="index.php?action=supprimerliste" method="POST">
<input type="hidden" id="nom_liste" name="nom_liste" value="<?=$nom_liste?>"/>
<button type="submit" class="btn btn-success">Supprimer la liste</button>
</form>
</div>

</div>
</body>
<footer>
<div class="p-3 mb-2 bg-success text-white">
<div class="d-flex justify-content-center">
<p class="iep">Sophia Solignac - Lou Labussiere</p>
</div>
<div class="d-flex justify-content-center">
<p>Groupe 8</p>
</div>
</div>
</footer>
</html>
