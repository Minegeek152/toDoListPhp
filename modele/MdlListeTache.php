<?php
class MdlListeTache{

//fonctions pour les taches
	public function getAllTaches() : array {
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		
		$array_taches = $taskGateway->getAllTaches();
		return $array_taches;
	}

	public function findTachesByIdTache($id) : Tache{
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		
		$tache = $taskGateway->findByIdTache($id);
		return $tache;
	}
	
	public function findTachesByIdListe($idListe){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
		
		$array_taches = $taskGateway->findByIdListe($idListe);
		return $array_taches;	
	}
	
	public function newTache($intitule, $idListe){
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
	
	public function deleteTache($intitule){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$taskGateway = new TacheGateway($con);
	
		$tache=$taskGateway->findByNom($intitule);
		$taskGateway->deleteTache($tache);
	}
	
//fonctions pour les listes
	public function getAllListes() {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$array_listes = $listGateway->getAllListe();
		return $array_listes;
	}
	
	public function findListeById($id){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = $listGateway->findById($id);
		return $liste;
	}
	
	public function findListeByNom($nom){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = $listGateway->findByNom($nom);
		return $liste;
	}
	
	public function findListeByIdMembre($idmembre) {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$array_listes = $listGateway->findByIdMembre($idmembre);
		if ($array_listes==NULL) return array();
		return $array_listes;
	}
	
	public function findListeByNomAndMembre($nom,$idmembre) {
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = $listGateway->findByNomAndMembre($nom,$idmembre);
		return $liste;
	}
	
	public function newListe($nom, $idMembre){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = new Liste($nom, $idMembre);
		$listGateway->newListe($liste);	
	}
	
	public function updateListeNom($nom, $idMembre, $nouv_nom){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = $this->findListeByNom($nom);
		$listGateway->updateListeNom($liste,$nouv_nom);
	}
	
	public function deleteListe($nom, $idMembre, $id){
		global $dns, $user, $pass;
		$con = new Connection($dns,$user,$pass);
		$listGateway = new ListeGateway($con);
		
		$liste = new Liste($nom, $idMembre,$id);
		$listGateway->deleteListe($liste);
	}
}
?>