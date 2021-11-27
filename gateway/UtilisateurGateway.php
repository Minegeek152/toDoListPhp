<?php 

class UtilisateurGateway{

	private $con;

	function __construct(Connection $con){
		$this->con=$con;
	}

	public function insert2(string $pseudo,string $mdp){

	}


	public function insert(Utilisateur $user){
		$pseudo=$user->getPseudo();
		$mdp=$user->getMdp();
		$query='INSERT into Membre value(NULL,:name,:mdp)';

		try{
			$this->con->executeQuery($query,array(
				':name' => array($pseudo,PDO::PARAM_STR), 
				':mdp' => array($mdp,PDO::PARAM_STR)));
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function selectAll(){
		$query='SELECT * from Membre';

		try{
			$this->con->executeQuery($query,array());
			$ab=$this->con->getResults();
			foreach ($ab as $row) {
				echo 'Id :'.$row['idMembre'].'    Pseudo : '.$row['pseudo'].'     Mdp : '.$row['mdp'].'<br/>';
			}

		}catch(PDOexception $e){
			echo $e->getMessage();
		}

	}
}

?>