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

<div class="fixed-top">
<div class="p-3 mb-2 bg-success text-white">
<div class="d-flex justify-content-center">
<h1 class="display-6">What To Do ?</h1>
</div>

<div class="d-flex justify-content-center">
<nav>
<ul class="nav nav-tabs">
<li class="nav-item"> <a class="nav-link" style="color : white;" href="<?=$rep.vues['accueil']?>">Accueil</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="seconnecter.php">Se connecter</a> </li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="index.php?page=nouvelleListe.php">Cr&eacute;er une liste</a></li>
<li class="nav-item"> <a class="nav-link" style="color : white;" href="rechercheListe.php">Rechercher une liste</a></li>
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
<div id="nouv_tache">
<aside>
<form class="gerer" action="" method="post">
<p>
<label for="intitule">Ajouter une t&acirc;che : </label> 
<input type="text" id="intitule" name="intitule" required />
<label for="nom"></label>
<input type="hidden" id="nom" name="nom" value="<?=$_POST["nom"]?>"/>
</p>
<input class="voir_liste" type="submit" value="Ajouter" />
</form>
</aside>
</div>

<?php
	if(isset($_POST['intitule'])){
		\Verif::verifTache($_POST['intitule'],$message);
	
		if(!empty($message)){
			require('erreur.php');
		}
		else{
			$tache = new Tache($_POST['intitule'],$liste_id);
			try{
  				$taskGateway->newTache($tache);
  			}catch(PDOException $e){
  				$message[]=$e->getMessage();
				require('erreur.php');
  			}
		}
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
