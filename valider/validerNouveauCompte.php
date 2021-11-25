<?php
 $message="";
 
if(empty($_GET['login_iscrp'])){
//on vérifie que le login est bien attribué

	//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
	$message = $message . "il faut renseigner un login </br>";
	//si c'est pas le cas on affiche un message
}
else $login = filter_var($_GET['login_iscrp'], FILTER_SANITIZE_STRING);
//si c'est le cas on le filtre et on le met dans une variable

if(empty($_GET['mdp_iscrp'])){
//on vérifie que le mot de passe est bien attribué

	//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
	$message = $message . "il faut renseigner un mot de passe </br> ";
	//si c'est pas le cas on affiche un message
}
else $mdp = filter_var($_GET['mdp_iscrp'], FILTER_SANITIZE_STRING);
//si c'est le cas on le filtre et on le met dans une variable

if(empty($_GET['email'])){
//on vérifie que le mail est bien attribué
	
	//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
	$message = $message . "il faut renseigner une adresse email </br> ";
	//si c'est pas le cas on affiche un message
}
else {
	
	if(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL, $options = null)){
	//on vérifie que le mail est au bon format
	
		//faire appel à la page erreur.php avec un header, mais il faut lui passer le message en parametre 
		$message = $message . "l adresse mail n est pas correcte </br> ";
		//si c'est pas le cas on affiche un message
	}
	else $email = $_GET['email'];
	//si c'est le cas on le met dans une variable
	
}

?>