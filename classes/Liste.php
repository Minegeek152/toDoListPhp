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

	function getIdListe():int{
		return $this->idListe;
	}

	function getNom():string{
		return $this->nom;
	}

	function getIdMembre():int{
		return $this->idMembre;
	}

	function setNom(string $nom){
		$this->nom=$nom;
	}

}

?>