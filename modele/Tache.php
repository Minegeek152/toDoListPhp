<?php
class Tache {
	private $intitule;
	private $identifiant;
	private $complete;
	
	public function __construct (string $tache, int $compl, int $id){
		$this->intitule = $tache;	
		$this->complete = $compl;
		$this->identifiant = $id;
	}
	
	public function __toString() : string {
		return $this->intitule;	
	}
}
?>