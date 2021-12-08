<?php
class Modele{
	
	private $listGateway;
	private $taskGateway;
	private $memberGateway;
	
	function __construct(){
		$con = new Connexion($dns,$user,$pass);
		$this->listGateway = new ListeGateway($con);
		$this->taskGateway = new TacheGateway($con);
		$this->memberGateway = new MembreGateway($con);
	}
	
//fonctions pour les taches
	function array Tache getAllTaches(){
		$array_taches[] = $taskGateway->getAllTaches();
		return $array_taches;
	}

	function Tache findTacheByIdTache($id){
		$tache = $taskGateway->findByIdTache($id);
		return $tache;
	}
	
	function array Tache findTacheByIdListe($idListe){
		$array_taches[] = $taskGateway->findByIdListe($idListe);
		return $array_taches;	
	}
	
	function void newTache($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
		$taskGateway->newTache($tache);
	}
	
	function void completeToggleTache ($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
		$taskGateway->completeToggleTache($tache);
	}
	
	function void deleteTache($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
		$taskGateway->deleteTache($tache);
	}
	
//fonctions pour les listes
	function array Liste getAllListes(){
		$array_listes[] = $listGateway->getAllListe();
		return $array_all_listes;
	}
	
	function Liste findListeById($id){
		$liste = findById($id);
		return $liste;
	}
	
	function Liste findListeByNom($nom){
		$liste = findByNom($nom);
		return $liste;
	}
	
	function array Liste findListeByIdMembre($idmembre){
		$array_listes[] = $listGateway->findByIdMembre($idmembre);
		return $array_listes;
	}
	
	function void newListe($nom, $idMembre){
		$liste = new Liste($nom, $idMembre);
		$listGateway->newListe($liste);	
	}
	
	function void updateListeNom($nom, $idMembre, $nouv_nom){
		$liste = new Liste($nom, $idMembre);
		$listGateway->updateListeNom($liste,$nom);
	}
	
	function void deleteListe($nom, $idMembre){
		$liste = new Liste($nom, $idMembre);
		$listGateway->updateListeNom($liste,$nom);
	}
	
//fonction pour les membres
	function array Membre getAllMembres(){
		$array_membres = $memberGateway->getAllMembre();
		return $array_membres;
	}
	
	function Membre findMembreByPseudo($pseudo){
		$membre = $memberGateway->findByPseudo($pseudo);
		return $membre;
	}
	
	function Membre findMembreById($id){
		$membre = $memberGateway->findById($id);
		return $membre;
	}
	
	function void newMembre($pseudo,$mdp){
		$membre = new Membre($pseudo,$mdp);
		$memberGateway->newMembre($membre);
	}
	
	function void updateMembrePseudo($pseudo,$mdp, $nouv_pseudo){
		$membre = new Membre($pseudo,$mdp);
		$memberGateway->updateMembrePseudo($membre,$nouv_pseudo);	
	}
	
	function void deleteMembre($pseudo,$mdp){
		$membre = new Membre($pseudo,$mdp);
		$memberGateway->deleteMembre($membre);	
	}
	
//pour supprimer une liste, il faut supprimer toutes ces taches
	function void supListeEtTaches($idliste){
		$liste = $this->findListeById($idliste);
		
		$taches[] = $this->findByIdListe($idliste);
		foreach($taches as $row){
			$this->deleteTache($row['intitule'],$row['idListe']);
		}
		$this->deleteListe($liste->getNom(),$liste->getIdListe());
		
	}
//pour supprimer un membre, il faut supprimer toutes ces listes
	function void supMembreEtListes($idmembre){
		$listes[] = $this->findListeByIdMembre($idmembre);
		foreach($listes as $row){
			$this->supListeEtTaches($row['idListe']);
		}
		
	}
}

?>