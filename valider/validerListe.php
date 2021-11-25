<?php
 $message="";
 
if(empty($_GET['nom'])){
//on vérifie que le nom est bien attribué

	//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
	$message = $message . "il faut renseigner un nom </br>";
	//si c'est pas le cas on affiche un message
}
else $nom = filter_var($_GET['nom'], FILTER_SANITIZE_STRING);
//si c'est le cas on le filtre et on le met dans une variable

?>