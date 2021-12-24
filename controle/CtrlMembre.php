<?php

class CtrlMembre{

	function __construct($action){
		global $rep, $vues, $message;
			
		try{
			switch($action){
					/*case 'toutesleslistes' :
						$this->toutesLesListes($message);
						break;*/
					case 'sedeconnecter' :
						$this->seDeconnecter($message);
						break;
					case 'ajouterlisteconnecte' :
						$this->ajouterListeConnecte($message);
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

	function toutesLesListes($message){
	//a completer
	
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
				
				$modeleListeTache->newListe($nom_liste,$idmembre);
			}			
			else{
				
				$modeleListeTache->newListe($nom_liste,1);//1 c'est le 'membre' utilisateur
			}
			//$this->affichageListe($message);
			require($rep.$vues['nouvelleliste_connecte']);
		}else{
			require($rep.$vues['nouvelleliste_connecte']);
		}
	}
	
	
}
?>