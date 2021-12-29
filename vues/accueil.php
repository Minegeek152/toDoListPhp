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
    	<label for="nom" ></label>
    	<input type="submit" id="nom" name="nom" value="<?=$uneliste->getNom()?>" />
		<!--button class="btn btn-success" type="submit" id="nom" name="nom"><?=$uneliste->getNom()?></button-->   	
    	<?php
    	
		foreach($taches as $tachesbyid){
			foreach($tachesbyid as $unetache){
				if($unetache->getIdListe() == $uneliste->getIdListe()){
					$nom_tache=$unetache->getIntitule();
					if($unetache->isComplete()){
						$complete='uncheck';
					}
					else $complete ='check';
				
		?>
				<?php if($complete=='uncheck'){?> <del><?php }?>
    					
      					<p><?=$nom_tache?></p>

      				<?php if($complete=='uncheck'){?> </del><?php }	

				}
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

<?php 
	if(isset($_SESSION['role']) && isset($_SESSION['login'])){
		include("footer_connecte.html");
	}else{
		include("footer.html");
	}
 ?>
</html>
