<?php
class Tache {
	private $intitule;
	private $idTache;
	private $complete;
	private $idListe;
	
	public function __construct (string $tache, int $compl, int $id, int $idLi){
		$this->intitule = $tache;	
		$this->complete = $compl;
		$this->idTache = $id;
		$this->idListe = $idLi;
	}
	
	public function __toString() : string {
		return $this->intitule;	
	}
}
?>