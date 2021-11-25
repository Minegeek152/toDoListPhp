<?php

class TacheGateWay{
	private $con;
	
	public function __construct(Connection $con){
		$this->con = $con;
	}
	
	public function findById(int $id) : Tache {
		$query = "SELECT * FROM Tache WHERE idTache = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$found_tache = new Tache($row['intitule'],$row['complete'],$row['idTache'],$row['idListe']);
		return $found_tache;
	}
	
	public function showTaches() {
		$taches=[];
		$query = "SELECT * FROM Tache";
		$this->con->executeQuery($query,array());
		
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$taches[] = new Tache($row['intitule'],$row['complete'],$row['idTache'],1);
		return $taches;
	}
	
	public function newTache(string $intitule, int $idliste){
		
		$query = "SELECT COUNT(*) as nb FROM Tache";
		$this->con->executeQuery($query,array());
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$nbTache = $row['nb'];
	
		$query = "INSERT INTO Tache VALUES (:intitule,:complete,:identifiant,:idliste)";
		$this->con->executeQuery($query,
	array(':intitule' => array($intitule,PDO::PARAM_STR), 
			':complete' => array(0,PDO::PARAM_INT),
			':identifiant' => array($nbTache,PDO::PARAM_INT), 
			':idliste' => array($idliste,PDO::PARAM_INT)) );		
	}
	
	public function completeTache(int $compl, int $id){
		$query = "UPDATE Tache SET complete = :compl WHERE idTache  = :id";
		$this->con->executeQuery($query,array(':comp'=>array($compl,PDO::PARAM_INT),
															':id'=>array($id,PDO::PARAM_INT)));
	}
	
	public function updateTache(string $intitule, $id){
		$query = "UPDATE Tache SET intitule = :intitule WHERE idTache = :id";
		$this->con->executeQuery($query,array(':intitule'=>array($intitule,PDO::PARAM_STR),
															':id'=>array($id,PDO::PARAM_INT)));	
	}
	
	public function deleteTache(int $id){
		$query = "DELETE FROM Tache WHERE idTache = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
	}
}
?>