<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Nouveau_Compte</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<header>
<div class="tete">
<h1 class="titre">What To Do ?</h1>
</div>
<nav class="le_menu">
<ul>
<li class="menu"> <a href="accueil.php">Accueil</a> </li>
<li class="menu"> <a href="seconnecter.php">Se connecter</a> </li>
<li class="menu"> <a href="nouvelleListe.php">Cr&eacute;er une liste publique</a></li>
<li class="menu"> <a href="rechercheListe.php">Rechercher une liste</a></li>
<ul class="connecte">
<li class="menu"> <a href="nouvelleListe.html">Cr&eacute;er une liste privée</a></li>
</ul>
</ul>
</nav>
</header>
<div class="ventre">

<h2 class="petit_titre">Inscription</h2>

<form action="" method="post">
<p>
<label for="login"> Login * :</label> 
<input type="text" id="login" name="login" required />
</p>
<p>
<label for="mdp"> Mot de passe * :</label> 
<input type="password" id="mdp" name="mdp" required />
</p>
<input type="submit" value="Valider"/>
</form>

<?php
	require("../classes/Connection.php");
	require("../utils.php");
	require("../gateway/MembreGateway.php");
	require("../classes/Membre.php");
	require("../verifier/Verif.php");

	$message=[];
	$connect = new Connection($dns,$user,$pass);
	$userGateway = new MembreGateway($connect);
	
	if(isset($_POST['login'],$_POST['mdp'])){
		\Verif::verifCompte($_POST['login'],$_POST['mdp'],$message);
	
		if(!empty($message)){
			require('erreur.php');
		}
		else{
			$user = new Membre($_POST['login'],$_POST['mdp']);
			try{
  				$userGateway->newMembre($user);
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