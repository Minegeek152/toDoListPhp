<?php
class CtrlUtilisateur{

	public function __construct(){
		global $rep, $vues, $message, $action;
	
		try{
			switch($action){
					case NULL : //pas d'action, on appelle vue principale
						$this->Reinit();
						break;
					/*case 'seconnecter' :
						$this->($message);
						break;
					case 'creercompte' :
						$this->($message);
						break;
					case 'afficherliste' :
						$this->affichageListe($message);
						break;
					case 'rechercherlistepublique' :
						$this->rechercheListe($message);
						break;
					case 'ajoutertache' :
						$this->($message);
						break;
					case 'completertache' :
						$this->($message);
						break;
					case 'supprimertache' :
						$this->($message);
						break;*/
					case 'ajouterlistepublique' :
						$this->ajouterListePublique($message);
						break;
					/*case 'modifierlistepublique' :
						$this->($message);
						break;
					case 'supprimerlistepublique' :
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

	function Reinit(){
	global $rep, $vues;
	
	$model = new MdlListeTache();
	$listes = $model->getAllListes();	
	require($rep.$vues['accueil']);
	}
	
	function ajouterListePublique($message){
	global $rep, $vues;
	
	$nom = $_POST['nom'];
	Verif::verif_str($nom);
	
	$model = new MdlListeTache();
	$model->newListe($nom,1);
	
	require($rep.$vues['accueil']);
	}
	
}
?>