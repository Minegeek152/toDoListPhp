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
			<h2 class="petit_titre"><?=$nom_liste?></h2>
	</div>
	<form action="index.php?action=modifierliste" method="POST">
		<div class="input-group mb-3">
  			<input type="text" class="form-control" id="nouv_nom" name="nouv_nom" placeholder="Modifier le nom de la liste"/>
  			<input type="hidden" id="nom" name="nom" value="<?=$nom_liste?>"/> 
  			<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Valider</button>
		</div>
		<?php 
			if(isset($message['ERR_NOM_EXIST'])) {?>
				<p style="color:red"><?=$message['ERR_NOM_EXIST']?></p>
		<?php }?>
	</form>
	<?php
		if(isset($message['ERR_NO_TASKS'])) {?>
			<div class="d-flex justify-content-center">
				<p style="color:red"><?=$message['ERR_NO_TASKS']?></p>
			</div>
	<?php }else{
		foreach($taches as $unetache){
			$nom_tache = $unetache->getIntitule();
			if($unetache->isComplete()){
				$complete='uncheck';
			} else $complete ='check';
	?>
    		<div class="d-flex justify-content-center">	
    			<div class="container">
  					<div class="row">
    					<div class="col">
    						<?php if($complete=='uncheck'){?> <del><?php }?>
      						<p><?=$nom_tache?></p>
							<?php if($complete=='uncheck'){?> </del><?php }?>
    					</div>
    					<div class="col">
      					<div class="form-check">
								<form action="index.php?action=completertache" method="post">
									<input type="hidden" id="nom_liste" name="nom_liste" value="<?=$nom_liste?>"/>  
									<input type="hidden" id="nom_tache" name="nom_tache" value="<?=$nom_tache?>"/>
									<button type="submit" class="btn btn-success"><?=$complete?></button>
  								</form>
							</div>
    					</div>
    					<div class="col">
     						<form action="index.php?action=supprimertache" method="POST">
     							<input type="hidden" id="nom_liste" name="nom_liste" value="<?=$nom_liste?>"/> 
								<input type="hidden" id="nom_tache" name="nom_tache" value="<?=$nom_tache?>"/>
								<button type="submit" class="btn btn-success">X</button>
							</form>
    					</div>
  					</div>
				</div>
			</div>
			<?php 
		}
	}
			?>

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
<?php 
	if(isset($_SESSION['role']) && isset($_SESSION['login'])){
		include("footer_connecte.html");
	}else{
		include("footer.html");
	}
 ?>
</html>
