<?php 

class MembreGateway{

	private $con;

	function __construct(Connection $con){
		$this->con=$con;
	}

	public function findById(int $id) {
		$query = "SELECT * FROM Membre WHERE idMembre = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		
		$results = $this->con->getResults();
		foreach ($results as $row)
			$found_membre = new Membre($row['pseudo'],$row['mdp'],$row['idMembre']);
		return $found_membre;
	}
	
	public function findByPseudo(string $pseudo){
		$query = "SELECT * FROM Membre WHERE pseudo = :pseudo";
		$this->con->executeQuery($query,array(':pseudo'=>array($pseudo,PDO::PARAM_STR)));
		
		$results = $this->con->getResults();
		foreach ($results as $row)
			$found_membre = new Membre($row['pseudo'],$row['mdp'],$row['idMembre']);
		if(isset($found_membre)) return $found_membre;
		return NULL;
	}

	public function newMembre(Membre $user){


		$pseudo=$user->getPseudo();
		$mdp=password_hash($user->getMdp(), PASSWORD_DEFAULT);
		$query='INSERT into Membre value(NULL,:name,:mdp)';

		
		$this->con->executeQuery($query,array(
			':name' => array($pseudo,PDO::PARAM_STR), 
			':mdp' => array($mdp,PDO::PARAM_STR)));
		
	}

	public function getAllMembre(){
		$query='SELECT * from Membre';


		$this->con->executeQuery($query,array());
			

		$results = $this->con->getResults();

		foreach ($results as $row)
			$Membres[] = new Membre($row['pseudo'],$row['mdp']);
		return $Membres;

	}


	public function updateMembrePseudo(Membre $membre, $pseudo){
		
		$idMembre=$membre->getId();

		$query = "UPDATE Membre SET pseudo = :pseudo WHERE idMembre = :id";
		$this->con->executeQuery($query,array(
			':pseudo'=>array($pseudo,PDO::PARAM_STR),
			':id'=>array($idMembre,PDO::PARAM_INT)));	
	}


	public function deleteMembre(Membre $membre){
		$idMembre=$membre->getId();

		$query = "DELETE FROM Membre WHERE idMembre = :id";
		$this->con->executeQuery($query,array('
			:id'=>array($idMembre,PDO::PARAM_INT)));
	}

}
?>