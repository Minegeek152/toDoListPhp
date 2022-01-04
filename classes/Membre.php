<?php 

class Membre{
 	private $pseudo;
 	private $mdp;
   private $id;

 	public function __construct(string $pseudo,string $mdp,int $id=NULL){
 		$this->pseudo=$pseudo;
 		$this->mdp=$mdp;
      $this->id=$id;
 	}

 	public function __toString(){
 		return $this->pseudo;
 	}

   public function getPseudo(){
       return $this->pseudo;
   }

   public function getMdp(){        
   	return $this->mdp;
  	}
   
   public function getId(){
       return $this->id;
   }

   public function setPseudo(string $pseudo){
       $this->pseudo=$pseudo;
   }

   public function setMdp(string $mdp){
       $this->mdp=$mdp;
   }
 } 
?>