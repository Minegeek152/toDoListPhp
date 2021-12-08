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

	function getIntitule():string{
		return $this->intitule;
	}

	function isComplete():bool{
		return $this->complete;
	}
	function getIdTache(){
		return $this->idTache;
	}

	function getIdListe():int{
		return $this->idListe;
	}

	function setIntitule(string $intitule){
		$this->intitule=$intitule;
	}

	function toggleComplete(){
		$this->complete=!$this->complete;
	}
}
?>