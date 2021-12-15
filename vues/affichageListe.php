<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Liste</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

<?php include("header.html");?>


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
<?php
	foreach($taches as $unetache){
		$nom_tache = $unetache->getIntitule();
		if($unetache->isComplete()){
			$complete='uncheck';
			}
			else $complete ='check';
    		?>
    	<div class="d-flex justify-content-center">	
    		<div class="container">
  				<div class="row">
    				<div class="col">
      				<p><?=$nom_tache?></p>
    				</div>
    				<div class="col">
      				<div class="form-check">
							<form>
  								<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
  								<label class="form-check-label" for="flexCheckChecked"><?=$complete?></label>
  							</form>
						</div>
    				</div>
    				<div class="col">
     					<form action="" method="POST">
							<input type="hidden" id="nom_tache" name="nom_tache" value="<?=$nom_tache?>"/>
							<button type="submit" class="btn btn-success">Supprimer</button>
						</form>
    				</div>
  				</div>
			</div>
		</div>
		
	<?php 
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
<?php include("footer.html");?>
</html>
