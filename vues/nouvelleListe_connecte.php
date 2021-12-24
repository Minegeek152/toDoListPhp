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
<h2 class="petit_titre">Cr&eacute;er une liste</h2>
</div>

<div class="d-flex justify-content-center">
<form action="index.php?action=ajouterlisteconnecte" method="POST">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="choix_liste" id="liste_publique" value="publique">
  <label class="form-check-label" for="liste_publique">liste publique</label>
</div>
<div class="form-check form-check-inline" style="margin: 5% 0;">
  <input class="form-check-input" type="radio" name="choix_liste" id="liste_privee" value="privee" checked>
  <label class="form-check-label" for="liste_privee">liste priv&eacute;e</label>
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" id="nom" name="nom" placeholder="Créer une nouvelle liste"/>  
  <input type="hidden" name="login" value="<?=$_SESSION['login']?>"/> 
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