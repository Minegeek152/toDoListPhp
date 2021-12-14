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
						break;*/
					case 'affichageListe' :
						$this->affichageListe($message);
						break;
					/*case 'rechercherlistepublique' :
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
	
		$modele = new MdlListeTache();
		$listes = $modele->getAllListes();
		foreach($listes as $row){
			$id=$row->getIdListe();
			$taches[] = $modele->findTacheByIdListe($id);
		}
		require($rep.$vues['accueil']);
	}
	
	function ajouterListePublique($message){
		global $rep, $vues;
		if(isset($_POST['nom'])){
			$nom = $_POST['nom'];
			Verif::verif_str($nom);
			$model = new MdlListeTache();
			$model->newListe($nom,1);//1 c'est le 'membre' utilisateur
			$this->Reinit();
		}else{
			require($rep.$vues['nouvelleliste']);
		}
	
	}
	
	function affichageListe($message){
		global $rep, $vues;
		if(isset($_POST['nom_liste'])){
			$nom_liste = $_POST['nom_liste'];
			Verif::verif_str($nom_liste);
			$model = new MdlListeTache();
			$liste = $modele->findListeByNom($nom_liste);
			$id = $liste->getIdListe();
			$taches = $model->findTachesByIdListe($id);
			require($rep.$vues['affichageliste']);
		}else{
			$this->Reinit();
		}
	
	}
	
}
?>