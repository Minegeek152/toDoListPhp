<?php
class Tache {
	private $intitule;
	private $idTache;
	private $complete;
	private $idListe;
	
	public function __construct (string $tache,int $idLi, bool $compl=false, int $id=NULL) {
		$this->intitule = $tache;	
		$this->complete = $compl;
		$this->idTache = $id;
		$this->idListe = $idLi;
	}
	
	public function __toString() : string {
		return $this->intitule;	
	}

	public function getIntitule():string{
		return $this->intitule;
	}

	public function isComplete():bool{
		return $this->complete;
	}
	
	public function getIdTache(){
		return $this->idTache;
	}

	public function getIdListe():int{
		return $this->idListe;
	}

	public function setIntitule(string $intitule){
		$this->intitule=$intitule;
	}

	public function toggleComplete(){
		$this->complete=!$this->complete;
	}
}
?>