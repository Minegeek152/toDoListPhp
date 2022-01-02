<?php

class CtrlMembre{

	function __construct($action){
		global $rep, $vues, $message;
			
		try{
			switch($action){
					case 'toutesleslistes' :
						$this->toutesLesListes($message);
						break;
					case 'sedeconnecter' :
						$this->seDeconnecter($message);
						break;
					case 'ajouterlisteconnecte' :
						$this->ajouterListeConnecte($message);
						break;
					case 'listesprivees' :
						$this->listesPrivees($message);
						break;
					
						
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

	function toutesLesListes($message){
		global $rep, $vues;
	
		$modele = new MdlListeTache();
		$modeleMembre = new MdlMembre();
		$listes = $modele->findListeByIdMembre(1);
		$membre=$modeleMembre->findMembreByPseudo($_SESSION['login']);
		$listes = array_merge($listes,$modele->findListeByIdMembre($membre->getId()));
		if(empty($listes)){
			$message['ERR_NO_LISTS'] = "Il n'y a pas encore de listes";
			require($rep.$vues['accueil']);		
		}else{
			foreach($listes as $row){
				$id=$row->getIdListe();
				$taches[] = $modele->findTachesByIdListe($id);
			}
			require($rep.$vues['accueil']);
		}	
	}
	
	function listesPrivees($message){
		global $rep, $vues;
	
		$modele = new MdlListeTache();
		$modeleMembre = new MdlMembre();
		$membre=$modeleMembre->findMembreByPseudo($_SESSION['login']);
		$listes = $modele->findListeByIdMembre($membre->getId());
		if(empty($listes)){
			$message['ERR_NO_LISTS'] = "Il n'y a pas encore de listes";
			require($rep.$vues['accueil']);		
		}else{
			foreach($listes as $row){
				$id=$row->getIdListe();
				$taches[] = $modele->findTachesByIdListe($id);
			}
			require($rep.$vues['accueil']);
		}
	}

	function seDeconnecter($message){
		global $rep,$vues;
		
		$modeleMembre = new MdlMembre();
		
		$modeleMembre->deconnexion();
		
		$modeleListeTache = new MdlListeTache();
		$listes = $modeleListeTache->findListeByIdMembre(1);
		foreach($listes as $row){
			$id=$row->getIdListe();
			$taches[] = $modeleListeTache->findTachesByIdListe($id);
		}
		require($rep.$vues['accueil']);
	}
	
	function ajouterListeConnecte($message){
		global $rep,$vues;
		if(isset($_POST['nom']) && isset($_POST['choix_liste'])) {
			$nom_liste = $_POST['nom'];
			$choix_liste = $_POST['choix_liste'];
			$login = $_POST['login'];
			Verif::verif_str($nom_liste);
			Verif::verif_str($choix_liste);
			Verif::verif_str($login);
			
			$modeleListeTache = new MdlListeTache();

			if($choix_liste == 'privee'){
				$modeleMembre = new MdlMembre();
				$membre = $modeleMembre->findMembreByPseudo($login);			
				$idmembre = $membre->getId();		
			}			
			else{
				$idmembre = 1;//1 c'est le 'membre' utilisateur
			}
			$liste = $modeleListeTache->findListeByNomAndMembre($nom_liste,$idmembre);
			if($liste != NULL){
				$message['ERR_NOM_EXIST'] = "Ce nom est déjà pris";
				require($rep.$vues['nouvelleliste_connecte']);
			}
			else{
				$modeleListeTache->newListe($nom_liste,$idmembre);
				
				$liste = $modeleListeTache->findListeByNomAndMembre($nom_liste,$idmembre);
				$id = $liste->getIdListe();
				$taches = $modeleListeTache->findTachesByIdListe($id);
				if(empty($taches)){
					$message['ERR_NO_TASKS']="Il n'y a pas encore de taches";	
				}
				require($rep.$vues['affichageliste']);
			}
		}else{
			require($rep.$vues['nouvelleliste_connecte']);
		}
	}
	
	
}
?>