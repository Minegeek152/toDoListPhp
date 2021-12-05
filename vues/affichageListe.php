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

<?php $nom = $_POST["nom"] ?>
<h2 class="petit_titre"><?=$nom?></h2>

<div id="les_taches">
<ul>
<?php
	require("../verifier/Verif.php");
	require("../classes/Connection.php");
	require("../utils.php");
	require("../gateway/ListeGateway.php");
	require("../gateway/TacheGateway.php");
	require("../classes/Tache.php");
	require("../classes/Liste.php");
	
	$connect = new Connection($dns,$user,$pass);
	$listGateway = new ListeGateway($connect);
	$taskGateway = new TacheGateway($connect);
	
	$liste=$listGateway->findByNom($nom);
	$liste_id = $liste->getIdListe();
	
	
	$taches = $taskGateway->findByIdListe($liste_id);
	
	$message=[];
	foreach($taches as $row){
		if($row->isComplete()){
		$complete='done';
		}
		else $complete ='not done yet';
    		?>
		<li><?=$row->getIntitule().'	->	'.$complete?></li>
	<?php 
		} 
	?>
<ul>
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
