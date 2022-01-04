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
			<h2 class="petit_titre">Rechercher une liste</h2>
		</div>
		<div class="d-flex justify-content-center">
			<form action="index.php?action=rechercherliste" method="POST">
			<?php if(isset($message['ERR_LIST'])) {?>
				<p style="color:red"><?=$message['ERR_LIST']?></p>
			<?php }?>
				<div class="input-group mb-3">
	  				<input type="text" class="form-control" id="nom" name="nom" placeholder="Rechercher une liste"/>	
  					<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Valider</button>
				</div>
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