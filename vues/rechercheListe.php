<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Recherche_Tache</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<?php include("header.html");?>

<div class="ventre">

<div class="d-flex justify-content-center">
<h2 class="petit_titre">Rechercher une liste</h2>
</div>

<div class="d-flex justify-content-center">
<form action="index.php?action=rechercherliste" method="POST">
<div class="input-group mb-3">
  <input type="text" class="form-control" id="nom" name="nom" placeholder="Rechercher une liste"/>
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Valider</button>
</div>
</form>
</div>

</div>
</body>

<?php include("footer.html");?>
</html>