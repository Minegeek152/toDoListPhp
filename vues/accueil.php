<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Acceuil</title>
<link href= "../vues/to_do.css" rel="stylesheet" media="screen" type="text/css">
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

<h2 class="petit_titre">Listes de t&acirc;ches</h2>

<div class="toutes_les_listes">
	<?php 
	require("../classes/Connection.php");
	require("../utils.php");
	require("../gateway/ListeGateway.php");
	require("../gateway/TacheGateway.php");
	require("../classes/Tache.php");
	require("../classes/Liste.php");
	
	$connect = new Connection($dns,$user,$pass);
	$listGateway = new ListeGateway($connect);
	$taskGateway = new TacheGateway($connect);
	
	$listes=$listGateway->getAllListe();
	
	foreach ($listes as $row) {
    	?>
    	<div class="une_liste">
    	<form action="affichageListe.php" method="POST">
    	<label for="nom" ></label>
		<input class="voir_liste" type="submit" id="nom" name="nom" value="<?=$row->getNom()?>" />    	
    	
    	
    	<?php
    	$taches = $taskGateway->findByIdListe($row->getIdListe());
    	foreach($taches as $value){
    		if($value->isComplete()){
				$complete='done';
			}
			else $complete ='not done yet';
    	?>
		<p><?=$value->getIntitule().'	->	'.$complete ?></p>
    	<?php } ?>
    	</form>
    	</div>
<?php	} ?>

</div>

</div>
</body>

<footer>
<div class="pied">
<p class="iep">Sophia Solignac - Lou Labussiere<br/>Groupe 8</p>
</div>
</footer>
</html>
