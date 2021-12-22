<?php
class CtrlUtilisateur{

	public function __construct($action){
		global $rep, $vues, $message;
		try{
			switch($action){
					case NULL : //pas d'action, on appelle vue principale
						$this->Reinit();
						break;
					case 'seconnecter' :
						$this->seConnecter($message);
						break;
					case 'nouveaucompte' :
						$this->nouveauCompte($message);
						break;
					case 'affichageListe' :
						$this->affichageListe($message);
						break;
					case 'rechercherliste' :
						$this->rechercherListe($message);
						break;
					case 'ajoutertache' :
						$this->ajouterTache($message);
						break;
					case 'completertache' :
						$this->completerTache($message);
						break;
					case 'supprimertache' :
						$this->supprimerTache($message);
						break;
					case 'ajouterlistepublique' :
						$this->ajouterListePublique($message);
						break;
					case 'modifierliste' :
						$this->modifierListe($message);
						break;
					case 'supprimerliste' :
						$this->supprimerListe($message);
						break;
					
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
			$taches[] = $modele->findTachesByIdListe($id);
		}
		require($rep.$vues['accueil']);
	}
	
	function seConnecter($message){
		global $rep, $vues;
		if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			Verif::verif_str($pseudo);
			Verif::verif_str($mdp);
			
			$model = new MdlMembre();
			$reponse=$model->connexion($pseudo,$mdp);
			if($reponse=="ErrPseudo"){
				$message['ERR_PSEUDO'] = "Pseudonyme inconnu";	
				require($rep.$vues['seconnecter']);
			}
			elseif($reponse=="ErrMdp") {
				$message['ERR_MDP'] = "Mot de passe incorrect";
				require($rep.$vues['seconnecter']);
			}
			else{
				
			}
		}else{
			require($rep.$vues['seconnecter']);
		}
	}	
	
	function nouveauCompte($message){
		global $rep, $vues;
		if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			Verif::verif_str($pseudo);
			Verif::verif_str($mdp);
			
			$model = new MdlMembre();
			$reponse=$model->newMembre($pseudo,$mdp);
			if($reponse=="ErrPseudoExist"){
				$message['ERR_PSEUDO_EXIST'] = "Pseudo déjà pris";
				require($rep.$vues['nouveaucompte']);
			}

		}else{
			require($rep.$vues['nouveaucompte']);
		}
	}
	
	function affichageListe($message){
		global $rep, $vues;
		if(isset($_POST['nom'])){
			$nom_liste = $_POST['nom'];
			Verif::verif_str($nom_liste);
			
			$modele = new MdlListeTache();
			$liste = $modele->findListeByNom($nom_liste);
			$id = $liste->getIdListe();
			
			$taches = $modele->findTachesByIdListe($id);
			require($rep.$vues['affichageliste']);
		}else{
			$this->Reinit();
		}
	
	}
	
	function rechercherListe($message){
		global $rep, $vues;
		if(isset($_POST['nom'])){
			$nom_liste = $_POST['nom'];
			Verif::verif_str($nom_liste);
			
			$modele = new MdlListeTache();
			try{
				$liste = $modele->findListeByNom($nom_liste);
				$id = $liste->getIdListe();
			
				$taches = $modele->findTachesByIdListe($id);
				require($rep.$vues['affichageliste']);
			}
			catch(PDOException $e){
			$message[]="Erreur!! ".$e;
			require($rep.$vues['erreur']);
			}
		}else{
			require($rep.$vues['rechercherliste']);
		}
	}
	
	function ajouterListePublique($message){
		global $rep, $vues;
		if(isset($_POST['nom'])){
			$nom_liste = $_POST['nom'];
			Verif::verif_str($nom_liste);
			
			$model = new MdlListeTache();
			$model->newListe($nom_liste,1);//1 c'est le 'membre' utilisateur
			
			$this->affichageListe($message);
		}else{
			require($rep.$vues['nouvelleliste']);
		}
	
	}

	function modifierListe($message){
		global $rep, $vues;
		if(isset($_POST['nouv_nom']) && isset($_POST['nom_liste'])){
			$nouv_nom = $_POST['nouv_nom'];
			$nom_liste = $_POST['nom_liste'];
			
			Verif::verif_str($nouv_nom);
			Verif::verif_str($nom_liste);
			$modele = new MdlListeTache();
			
			$liste = $modele->findListeByNom($nom_liste);
			$id = $liste->getIdListe();
			
			$modele->updateListeNom($nom_liste, 1, $nouv_nom);
			
			$taches = $modele->findTachesByIdListe($id);
			require($rep.$vues['affichageliste']);
		}else{
			$this->Reinit();
		}
	}
	
	function ajouterTache($message){
		global $rep, $vues;
		if(isset($_POST['nouv_tache']) && isset($_POST['nom_liste'])){
			$nouv_tache = $_POST['nouv_tache'];
			$nom_liste = $_POST['nom_liste'];
			
			Verif::verif_str($nouv_tache);
			Verif::verif_str($nom_liste);
			$modele = new MdlListeTache();
			
			$liste = $modele->findListeByNom($nom_liste);
			$id = $liste->getIdListe();
			
			$modele-> newTache($nouv_tache, $id);
			
			$taches = $modele->findTachesByIdListe($id);
			require($rep.$vues['affichageliste']);
		}else{
			$this->Reinit();
		}
		
	}
	
	function completerTache($message){
		global $rep,$vues;
		if(isset($_POST['nom_tache']) && isset($_POST['nom_liste'])){
			$nom_tache = $_POST['nom_tache'];
			$nom_liste = $_POST['nom_liste'];
			Verif::verif_str($nom_tache);
			Verif::verif_str($nom_liste);
			
			$modele = new MdlListeTache();
			$liste = $modele->findListeByNom($nom_liste);
			$idliste = $liste->getIdListe();
				
			$modele->completeToggleTache($nom_tache,$idliste);
				
			$taches = $modele->findTachesByIdListe($idliste);
			require($rep.$vues['affichageliste']);
		}
	}
		
	function supprimerTache($message){
		global $rep, $vues;
		if(isset($_POST['nom_tache']) && isset($_POST['nom_liste'])){
			$nom_tache = $_POST['nom_tache'];
			$nom_liste = $_POST['nom_liste'];
			Verif::verif_str($nom_tache);
			Verif::verif_str($nom_liste);
			
			$modele = new MdlListeTache();
			$liste = $modele->findListeByNom($nom_liste);
			$idliste = $liste->getIdListe();
				
			$modele->deleteTache($nom_tache,$idliste);
				
			$taches = $modele->findTachesByIdListe($idliste);
			require($rep.$vues['affichageliste']);
		}else{
			$this->Reinit();
		}
			
	
	}
	function supprimerListe($message){
		global $rep, $vues;
		if(isset($_POST['nom_liste'])){
			$nom_liste = $_POST['nom_liste'];
			Verif::verif_str($nom_liste);
			
			$modele = new MdlListeTache();		
			$liste = $modele->findListeByNom($nom_liste);
			$id = $liste->getIdListe();
			$taches = $modele->findTachesByIdListe($id);
			
			foreach($taches as $unetache){
				$nom_tache = $unetache->getIntitule();
				$modele->deleteTache($nom_tache,$id);
			}
			deleteListe($nom_liste,1);
			$this->Reinit();//marche pas
		}else{
			$this->Reinit();
		}
		
	}
	
}
?>