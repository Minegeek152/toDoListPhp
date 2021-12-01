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
		foreach ($results as $row)
			$found_tache = new Tache($row['intitule'],$row['idListe'],$row['complete'],$row['idTache']);
		return $found_tache;
	}
	
	public function getAllTaches() : array {
		$query = "SELECT * FROM Tache";
		try{
			$this->con->executeQuery($query,array());
			$results = $this->con->getResults();
			
			foreach ($results as $row){

				if($row['complete']==1){
					$row['complete']=true;
				}
				else{
					$row['complete']=false;
				}
				$taches[]=new Tache($row['intitule'],$row['idListe'],$row['complete'],$row['idTache']);
			}

			return $taches;

			}catch(PDOexception $e){
				echo $e->getMessage();
			}


	}
	
	public function newTache(Tache $task){

		$intitule=$task->getIntitule();
		$idliste=$task->getIdListe();
		if($task->isComplete()){
			$complete=1;
		}
		else{
			$complete=0;
		}
		$idtache=$task->getIdTache();

		$query = "INSERT INTO Tache VALUES (:intitule,:complete,:identifiant,:idliste)";
		$this->con->executeQuery($query,
	array(':intitule' => array($intitule,PDO::PARAM_STR), 
			':complete' => array(0,PDO::PARAM_INT),
			':identifiant' => array($idtache,PDO::PARAM_INT), 
			':idliste' => array($idliste,PDO::PARAM_INT)) );		
	}
	
	public function completeToggleTache(Tache $task){
		if($task->isComplete()){
			$complete=0;
		}
		else{
			$complete=1;
		}
		$idtache=$task->getIdTache();

		$query = "UPDATE Tache SET complete = :complete WHERE idTache  = :id";
		$this->con->executeQuery($query,array(':complete'=>array($complete,PDO::PARAM_INT),
												':id'=>array($idtache,PDO::PARAM_INT)));
	}
	
	public function updateTache(Tache $task){
		$intitule=$task->getIntitule();
		if($task->isComplete()){
			$complete=1;
		}
		else{
			$complete=0;
		}
		$idtache=$task->getIdTache();

		$query = "UPDATE Tache SET intitule = :intitule WHERE idTache = :id";
		$this->con->executeQuery($query,array(':intitule'=>array($intitule,PDO::PARAM_STR),
												':id'=>array($idtache,PDO::PARAM_INT)));	
	}
	
	public function deleteTache(Tache $task){
		$idtache=$task->getIdTache();

		$query = "DELETE FROM Tache WHERE idTache = :id";
		$this->con->executeQuery($query,array(':id'=>array($idtache,PDO::PARAM_INT)));
	}
}
?>