<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>What_To_Do</title>
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

<h2 class="petit_titre">Connexion</h2>

<div class="formulaire">
<form action="" method="post">
<p>
<label for="login"> Login * :</label> 
<input type="text" id="login" name="login" required />
</p>
<p>
<label for="mdp"> Mot de passe * :</label> 
<input type="password" id="mdp" name="mdp" required />
</p>
<input class="voir_liste" type="submit" value="Valider"/>
<p>
<a href="nouveauCompte.php">Pas de compte ? Cliquer ici ;)</a>
</p>
</form>

</div>
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
			try{
  				$user = $userGateway->findByPseudo($_POST['login']);
  				/*if($user->getMdp() == $_POST['mdp']){ //pas fonctionnel
				?>
				<p><?="connecté :)"?></p>
  				<?php }
  				else{
  					$message[]="le mot de passe est incorrecte";
  				}*/
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