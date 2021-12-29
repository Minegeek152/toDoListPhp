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
			$message[]="Erreur inattendue : ".$e;
			require($rep.$vues['erreur']);
	
		}
		catch(Exception $e2){
			$message[]="Erreur inattendue : ".$e2;
			require($rep.$vues['erreur']);
		}
		
		exit(0);
	}

	function Reinit(){
		global $rep, $vues;
	
		$modele = new MdlListeTache();
		$listes = $modele->findListeByIdMembre(1);
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
				$this->Reinit();
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
			else{
				$this->Reinit();
			}
		}else{
			require($rep.$vues['nouveaucompte']);
		}
	}
	
	function affichageListe($message){
		global $rep, $vues;
		if(isset($_POST['nom']) || isset($_POST['nouv_nom'])){
			if(isset($_POST['nom'])){
				$nom_liste=$_POST['nom'];
			}
			if(isset($_POST['nouv_nom'])){
				$nom_liste=$_POST['nouv_nom'];
			}
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

			$liste = $modele->findListeByNom($nom_liste);

			if($liste != NULL){
				$id = $liste->getIdListe();
				$idMembreList=$liste->getIdMembre();
				if($idMembreList != 1){
					if(isset($_SESSION['login'])){

						$modeleMembre= new MdlMembre();
						$membre=$modeleMembre->findMembreByPseudo($_SESSION['login']);
						$idMembre=$membre->getId();
						if($idMembre != $idMembreList){
							$message['ERR_LIST']="Liste inconnue";
						}
					}
					else{
						$message['ERR_LIST']="Liste inconnue";
					}
				}


				

			}else{
				$message['ERR_LIST']="Liste inconnue";
			}

			if(!empty($message)){
				require $rep.$vues['rechercherliste'];
			}else{
				$taches = $modele->findTachesByIdListe($id);
				require($rep.$vues['affichageliste']);
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
			
			$modele = new MdlListeTache();
			
			$liste = $modele->findListeByNomAndMembre($nom_liste,1);//1 c'est le 'membre' utilisateur
			if($liste != NULL){
				$message['ERR_NOM_EXIST'] = "Ce nom est déjà pris";
				require($rep.$vues['nouvelleliste']);
			}
			else{
				$modele->newListe($nom_liste,1);//1 c'est le 'membre' utilisateur
				
				$this->affichageListe($message);
			}
			
		}else{
			require($rep.$vues['nouvelleliste']);
		}
	
	}

	function modifierListe($message){
		global $rep, $vues;
		if(isset($_POST['nouv_nom']) && isset($_POST['nom'])) {
			$nouv_nom = $_POST['nouv_nom'];
			$nom_liste = $_POST['nom'];
			
			Verif::verif_str($nouv_nom);
			Verif::verif_str($nom_liste);
			$modele = new MdlListeTache();
			
			if(isset($_SESSION['login'])){
				$modeleMembre = new MdlMembre();
				$membre = $modeleMembre->findMembreByPseudo($login);			
				$idmembre = $membre->getId();
			}
			else{
				$idmembre = 1;//1 c'est le 'membre' utilisateur
			}
			$liste = $modele->findListeByNomAndMembre($nouv_nom,$idmembre);
			if($liste != NULL){
				$message['ERR_NOM_EXIST'] = "Ce nom est déjà pris";
				unset($_POST['nouv_nom']);
				$this->affichageListe($message);
			}
			else{
				$liste = $modele->findListeByNomAndMembre($nom_liste,$idmembre);
				$id = $liste->getIdListe();
				
				$modele->updateListeNom($nom_liste, $idmembre, $nouv_nom);
			
				$taches = $modele->findTachesByIdListe($id);
				$this->affichageListe($message);
			}
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
			
			
			$modele->deleteTache($nom_tache);
				
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
			$id_liste = $liste->getIdListe();
			$taches = $modele->findTachesByIdListe($id_liste);
			
			foreach($taches as $unetache){
				$nom_tache = $unetache->getIntitule();
				$complete=$unetache->isComplete();
				$id_tache=$unetache->getIdTache();
				$modele->deleteTache($nom_tache,$id_liste,$complete,$id_tache);
			}
			$modele->deleteListe($nom_liste,1,$id_liste);
			$this->Reinit();//marche pas
		}else{
			$this->Reinit();
		}
		
	}
	
}
?>