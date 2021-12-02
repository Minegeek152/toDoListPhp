<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8"/>
<title>To_Do_Erreur</title>
<link href="to_do.css" rel="stylesheet" media="screen" type="text/css">
</head>

<body>
<?php 
	if(isset($message)){
		foreach($message as $row){
			echo $row;	
		}
}
?>
</body>
</html>
