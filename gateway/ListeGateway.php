<?php
class ListeGateway{
	private $con;

	public function __construct(Connection $con){
		$this->con = $con;
	}
	
	public function getAllListe() {
		$query="SELECT * FROM Liste";
		$this->con->executeQuery($query,array());
			
		$results = $this->con->getResults();
		foreach ($results as $row)
			$Listes[] = new Liste($row['nom'],$row['idMembre'],$row['idListe']);
		return $Listes;
	}
	
	public function findById(int $id) {
		$query = "SELECT * FROM Liste WHERE idListe = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		
		$results = $this->con->getResults();
		foreach ($results as $row)
			$found_liste = new Liste($row['nom'],$row['idMembre'],$row['idListe']);
		return $found_liste;
	}

	public function findByNom(string $nom){
		$query = "SELECT * FROM Liste WHERE nom = :nom";
		$this->con->executeQuery($query,array(':nom'=>array($nom,PDO::PARAM_STR)));
		
		$results = $this->con->getResults();
		foreach ($results as $row)
			return new Liste($row['nom'],$row['idMembre'],$row['idListe']);
	}
	
	public function findByIdMembre($id){
		$query = "SELECT * FROM Liste WHERE idMembre = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		
		$results = $this->con->getResults();
		$Listes=NULL;
		foreach($results as $row)
			$Listes[] = new Liste($row['nom'],$row['idMembre'],$row['idListe']);
		return $Listes;
	}
	
	public function findByNomAndMembre($nom,$id){
		$query = "SELECT * FROM Liste WHERE nom = :nom AND idMembre = :id";
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT),':nom'=>array($nom,PDO::PARAM_STR)));
		
		$results = $this->con->getResults();
		if(empty($results)) return NULL;
		else{
			foreach($results as $row)
				return new Liste($row['nom'],$row['idMembre'],$row['idListe']);
		}		
	}
	
	public function newListe(Liste $list){
		$nom=$list->getNom();
		$idMembre=$list->getIdMembre();
		
		$query="INSERT INTO Liste VALUES(NULL,:nom,:idMembre)";
		$this->con->executeQuery($query,array(':nom' => array($nom,PDO::PARAM_STR),':idMembre' => array($idMembre,PDO::PARAM_STR)));
	}
	
	public function updateListeNom(Liste $list, string $nom){
		$idListe=$list->getIdListe();
		
		$query = "UPDATE Liste SET nom = :nom WHERE idListe = :id";
		$this->con->executeQuery($query,array(':nom'=>array($nom,PDO::PARAM_STR),':id'=>array($idListe,PDO::PARAM_INT)));	
	}
	
	public function deleteListe(Liste $list){
		$idListe=$list->getIdListe();
		
		$query = "DELETE FROM Liste WHERE idListe = :id";
		$this->con->executeQuery($query,array(':id'=>array($idListe,PDO::PARAM_INT)));
	}	
}
?>