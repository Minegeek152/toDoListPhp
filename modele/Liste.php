<?php
class Liste{
	private $idListe;
	private $nom;
	private $idMembre;

	public function __construct(int $idListe,string $nom,int $idMembre){
		$this->idListe=$idListe;
		$this->nom=$nom;
		$this->idMembre=$idMembre;
	}

	function __toString():string{
		return $this->nom;
	}

}

?>