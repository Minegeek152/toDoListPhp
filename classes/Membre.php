<?php 

class Membre
{
 	private $pseudo;
 	private $mdp;
    private $id;

 	function __construct(string $pseudo,string $mdp,int $id=NULL)
 	{
 		$this->pseudo=$pseudo;
 		$this->mdp=$mdp;
        $this->id=$id;
 	}

 	function __toString(){
 		return $this->pseudo;
 	}

    function getPseudo(){
        return $this->pseudo;
    }

    function getMdp(){
        return $this->mdp;
    }

    function getId(){
        return $this->id;
    }

    function setPseudo(string $pseudo){
        $this->pseudo=$pseudo;
    }

    function setMdp(string $mdp){
        $this->mdp=$mdp;
    }
 } 


?>