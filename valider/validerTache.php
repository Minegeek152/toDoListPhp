<?php
 $message="";
 
if(empty($_GET['intitule'])){
//on vérifie que l'intitulé est bien attribué

	//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
	$message = $message . "il faut renseigner un intitule </br>";
	//si c'est pas le cas on affiche un message
}
else $intitule = filter_var($_GET['intitule'], FILTER_SANITIZE_STRING);
//si c'est le cas on le filtre et on le met dans une variable

?>