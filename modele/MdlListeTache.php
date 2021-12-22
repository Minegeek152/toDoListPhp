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
	
	function findTachesByIdListe($idListe) : array {
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
	
	function completeToggleTache ($intitule, $idListe){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$tache = new Tache($intitule,$idListe);
		$taskGateway->completeToggleTache($tache);
	}
	
	function deleteTache($intitule, $idListe, $complete, $idTache){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$tache = new Tache($intitule,$idListe,$complete,$idTache);
		$taskGateway->deleteTache($tache);
	}
	
//fonctions pour les listes
	function getAllListes() : array {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$array_listes = $listGateway->getAllListe();
		return $array_listes;
	}
	
	function findListeById($id) : Liste {
		$liste = findById($id);
		return $liste;
	}
	
	function findListeByNom($nom) : Liste {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		$liste = $listGateway->findByNom($nom);
		if($liste == NULL){
			
		}
		return $liste;
	}
	
	function findListeByIdMembre($idmembre) : array {
		$array_listes[] = $listGateway->findByIdMembre($idmembre);
		return $array_listes;
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