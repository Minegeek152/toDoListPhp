<?php
class Liste{
	private $idListe;
	private $nom;
	private $idMembre;

	public function __construct(string $nom,int $idMembre,int $idListe=NULL){
		$this->idListe=$idListe;
		$this->nom=$nom;
		$this->idMembre=$idMembre;
	}

	public function __toString():string{
		return $this->nom;
	}

	public function getIdListe():int{
		return $this->idListe;
	}

	public function getNom():string{
		return $this->nom;
	}

	public function getIdMembre():int{
		return $this->idMembre;
	}

	public function setNom(string $nom){
		$this->nom=$nom;
	}

}

?>