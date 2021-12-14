<?php
class MdlListeTache{
	
	
	function __construct(){
	
	}
	
//fonctions pour les taches
	function getAllTaches() : array {
		$array_taches = $taskGateway->getAllTaches();
		return $array_taches;
	}

	function findTacheByIdTache($id) : Tache{
		$tache = $taskGateway->findByIdTache($id);
		return $tache;
	}
	
	function findTacheByIdListe($idListe) : array {
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		$array_taches = $taskGateway->findByIdListe($idListe);
		return $array_taches;	
	}
	
	function newTache($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
		$taskGateway->newTache($tache);
	}
	
	function completeToggleTache ($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
		$taskGateway->completeToggleTache($tache);
	}
	
	function deleteTache($intitule, $idListe){
		$tache = new Tache($intitule,$idListe);
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
		$liste = findByNom($nom);
		return $liste;
	}
	
	function findListeByIdMembre($idmembre) : array {
		$array_listes[] = $listGateway->findByIdMembre($idmembre);
		return $array_listes;
	}
	
	function newListe($nom, $idMembre){
		$liste = new Liste($nom, $idMembre);
		$listGateway->newListe($liste);	
	}
	
	function updateListeNom($nom, $idMembre, $nouv_nom){
		$liste = new Liste($nom, $idMembre);
		$listGateway->updateListeNom($liste,$nom);
	}
	
	function deleteListe($nom, $idMembre){
		$liste = new Liste($nom, $idMembre);
		$listGateway->updateListeNom($liste,$nom);
	}
	
	

}

?>