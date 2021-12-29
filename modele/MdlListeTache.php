<?php
class MdlListeTache{
	
	
	function __construct(){
	
	}
	
//fonctions pour les taches
	function getAllTaches() : array {
		$array_taches = $taskGateway->getAllTaches();
		return $array_taches;
	}

	function findTachesByIdTache($id) : Tache{
		$tache = $taskGateway->findByIdTache($id);
		return $tache;
	}
	
	function findTachesByIdListe($idListe){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$array_taches = $taskGateway->findByIdListe($idListe);
		return $array_taches;	
	}
	
	function newTache($intitule, $idListe){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$tache = new Tache($intitule,$idListe);
		$taskGateway->newTache($tache);
	}
	
	function completeToggleTache ($intitule){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$tache=$taskGateway->findByNom($intitule);
		$taskGateway->completeToggleTache($tache);
	}
	
	function deleteTache($intitule){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$tache=$taskGateway->findByNom($intitule);
		$taskGateway->deleteTache($tache);
	}
	
//fonctions pour les listes
	function getAllListes() {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$array_listes = $listGateway->getAllListe();
		return $array_listes;
	}
	
	function findListeById($id){
		$liste = findById($id);
		return $liste;
	}
	
	function findListeByNom($nom){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = $listGateway->findByNom($nom);
		return $liste;
	}
	
	function findListeByIdMembre($idmembre) {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$array_listes = $listGateway->findByIdMembre($idmembre);
		if ($array_listes==NULL) return array();
		return $array_listes;
	}
	
	function findListeByNomAndMembre($nom,$idmembre) {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = $listGateway->findByNomAndMembre($nom,$idmembre);
		return $liste;
	}
	
	function newListe($nom, $idMembre){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = new Liste($nom, $idMembre);
		$listGateway->newListe($liste);	
	}
	
	function updateListeNom($nom, $idMembre, $nouv_nom){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = $this->findListeByNom($nom);
		$listGateway->updateListeNom($liste,$nouv_nom);
	}
	
	function deleteListe($nom, $idMembre, $id){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = new Liste($nom, $idMembre,$id);
		$listGateway->deleteListe($liste);
	}
	
	

}

?>