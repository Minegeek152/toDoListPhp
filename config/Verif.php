<?php
class Verif{
	
	 static function verifAction($action) {

        if (!isset($action)) {
            throw new Exception('il n\'y a pas d\'action');
	}
	}
		
	static function verifCompte(string &$login, string &$mdp, &$message){
		
		//vérification du login
		if(!isset($login) || $login==""){

			$message[] = 'il faut renseigner un login';
			$login="";
		}
		if($login != filter_var($login, FILTER_SANITIZE_STRING)){
		
			$message[] = 'le login n\'est pas valide';
			$login="";
		}

		//vérification du mot de passe
		if(!isset($mdp) || $mdp==""){

			$message[] = 'il faut renseigner un mot de passe';
			$mdp="";
		}
		if($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)){
			$message[] = 'le mot de passe n\'est pas valide';
			$mdp="";
		}
	}
	
	static function verifListe (string &$nom, &$message){	
		
		//vérification du nom de la tache
		if(!isset($nom) || $nom==""){
			$message[] = 'il faut renseigner un nom';
			$nom="";
		}
		if($nom != filter_var($nom, FILTER_SANITIZE_STRING)){
			$message[] = 'le nom n\'est pas valide';
			$nom="";
		}
	}
	
	static function verifTache(string &$intitule, &$message){
		
		//vérification du l'intitulé
		if(!isset($intitule) || $intitule==""){

			$message[] = 'il faut renseigner un intitule';
			$intitule="";
		}
		if($intitule != filter_var($intitule, FILTER_SANITIZE_STRING)){
			$message[] = 'l\'intitule n\'est pas valide';
			$intitule="";
		}
	}
	
}

?>