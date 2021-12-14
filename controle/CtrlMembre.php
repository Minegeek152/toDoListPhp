<?php

class CtrlMembre{

	function __construct(){
		global $rep, $vues $message;
			
		try{
			switch($action){
					/*case 'sedeconnecter' :
						$this->($message);
						break;
					case 'recherchertoutesleslistes' :
						$this->rechercheListe($message);
						break;
					case 'affichertoutesleslistes' :
						$this->($message);
						break;
					case 'ajouterlistepriv' :
						$this->($message);
						break;
					case 'modifierlistepriv' :
						$this->($message);
						break;
					case 'supprimerlistepriv' :
						$this->($message);
						break;*/
						
					default:
						$message[]="Erreur appel php!";
						require($rep.$vues['accueil']);
						break;
						
			}
		}
		catch(PDOException $e){
			$message[]="Erreur inattendue";
			require($rep.$vues['erreur']);
	
		}
		catch(Exception $e2){
			$message[]="Erreur inattendue";
			require($rep.$vues['erreur']);
		}
		
		exit(0);
	}

	
}
?>