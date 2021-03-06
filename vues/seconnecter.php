<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8"/>
	<title>What_To_Do</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<?php 
		if(isset($_SESSION['role']) && isset($_SESSION['login'])){
			include("header_connecte.html");
		}else{
			include("header.html");
		}
	?>
	<div class="ventre" style="min-height: 400px;">
		<div class="d-flex justify-content-center">
			<h2 class="petit_titre">Connexion</h2>
		</div>
		<div class="d-flex justify-content-center">
			<form action="index.php?action=seconnecter" method="post">
				<p>
				<?php if(isset($message['ERR_PSEUDO'])) {?>
					<p style="color:red"><?=$message['ERR_PSEUDO']?></p>
				<?php }?>
					<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required />
				</p>
				<p>
				<?php if(isset($message['ERR_MDP'])) {?>
					<p style="color:red"><?=$message['ERR_MDP']?></p>
				<?php }?>
					<input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required />
				</p>
				<button type="submit" class="btn btn-success">Valider</button>
				<p>
					<a href="index.php?action=nouveaucompte">Pas de compte ? Cliquer ici ;)</a>
				</p>
			</form>
		</div>

	</div>
</body>
<?php 
	if(isset($_SESSION['role']) && isset($_SESSION['login'])){
		include("footer_connecte.html");
	}else{
		include("footer.html");
	}
?>
</html>