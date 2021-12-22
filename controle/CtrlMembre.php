<?php

class CtrlMembre{

	function __construct(){
		global $rep, $vues $message;
			
		try{
			switch($action){
					case 'sedeconnecter' :
						$this->seDeconnecter($message);
						break;
					/*case 'listesprivees' :
						$this->rechercheListe($message);
						break;
					*/
						
					default:
						$message[]="Erreur appel php!";
						require($rep.$vues['accueil']);
						break;
						
			}
		}
		catch(PDOException $e){
			$message[]="Erreur PDO inattendue => ".$e;
			require($rep.$vues['erreur']);
	
		}
		catch(Exception $e2){
			$message[]="Erreur inattendue => ".$e2;
			require($rep.$vues['erreur']);
		}
		
		exit(0);
	}

	function seDeconnecter($message){
		global $rep,$vues;
		
		$modele = new MdlMembre();
		
		$modele->deconnexion();
		
		
	}
}
?>