<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Acceuil</title>
<!--link href= "../vues/to_do.css" rel="stylesheet" media="screen" type="text/css"-->
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
<h2 class="petit_titre">Listes de t&acirc;ches</h2>
</div>

<div class="d-flex justify-content-center">
<div class="toutes_les_listes">

	<?php
		foreach($listes as $uneliste){
	?>
    	<div class="une_liste">
    	<form action="index.php?action=affichageListe" method="POST">
    	<label for="nom_liste" ></label>
		<button class="btn btn-success" type="submit" id="nom" name="nom"><?=$uneliste->getNom()?></button>   	
    	<?php
		foreach($taches as $tachesbyid){
			foreach($tachesbyid as $unetache){
				if($unetache->isComplete()){
					$complete='done';
				}
				else $complete ='not done yet';
			?>
		<p><?=$unetache->getIntitule().'	->	'.$complete ?></p>		
		<?php
			}
		}
    	?>
		
    	</form>
    	</div>
		<?php
		 }
		?> 

</div>
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
