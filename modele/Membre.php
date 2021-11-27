<?php 

class Membre
{
 	private $pseudo;
 	private $mdp;


 	function __construct(string $pseudo,string $mdp)
 	{
 		$this->pseudo=$pseudo;
 		$this->mdp=password_hash($mdp,PASSWORD_DEFAULT);
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
 } 


?>