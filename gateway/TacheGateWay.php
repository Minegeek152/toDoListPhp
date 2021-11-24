<?php

class TacheGateWay{
	private $con;
	
	public function __construct(Connection $con){
		$this->con = $con;
	}
	
	public function findById(int $id) : Tache {
		$querry = "SELECT * FROM Tache WHERE identifiant = :id";
		$this->con->executeQuery($querry,array(':id'=>array($id,PDO::PARAM_INT)));
		
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$found_tache = new Tache($row['intitule'],$row['complete'],$row['identifiant']);
		return $found_tache;
	}
	
	public function showTaches() : array {
		$querry = "SELECT * FROM Tache";
		$this->con->executeQuery($querry,array());
		
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$taches[] = new Tache($row['intitule'],$row['complete'],$row['identifiant']);
		return $taches;
	}
	
	public function newTache(string $intitule){
		
		$querry = "SELECT COUNT(*) as nb FROM Tache";
		$this->con->executeQuery($querry,array());
		$results = $this->con->getResults();
		Foreach ($results as $row)
			$nbTache = $row['nb'];
	
		$querry = "INSERT INTO Tache VALUES (:intitule,:complete,:identifiant)";
		$this->con->executeQuery($querry,
	array(':intitule' => array($intitule,PDO::PARAM_STR), 
			':complete' => array(0,PDO::PARAM_INT),
			':identifiant' => array($nbTache,PDO::PARAM_INT) ) );		
	}
}
?>