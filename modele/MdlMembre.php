<?php
class MdlMembre{
		
	public function connexion(String $pseudo, string $mdp){
		global $dns,$user,$pass,$message;
			
		$con = new Connection($dns,$user,$pass);
		
		$memberGateway = new MembreGateway($con);

		$results = $memberGateway->findByPseudo($pseudo);
		if($results==NULL){	
			return "ErrPseudo";	
		}
		else{
			$password = $results->getMdp();
			if(password_verify($mdp,$password)){
				$_SESSION['role']='membre';
				$_SESSION['login']=$pseudo;
			}else{
				return "ErrMdp";
			}
		}
	}	
	
	public function deconnexion(){
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
		
	public function isMembre() {
		if(isset($_SESSION['role']) && isset($_SESSION['login'])) {
			if($_SESSION['role']!='membre') return NULL;		
			Verif::verif_str($_SESSION['role']);
			Verif::verif_str($_SESSION['login']);
				
			$membre = $this->findMembreByPseudo($_SESSION['login']);
			return $membre;
		}else return NULL;	
	}
		
	public function getAllMembres() : array{
		$array_membres = $memberGateway->getAllMembre();
		return $array_membres;
	}
	
	public function findMembreByPseudo($pseudo) {
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$membreGateway = new MembreGateway($con);
		
		$membre = $membreGateway->findByPseudo($pseudo);
		return $membre;
	}
	
	public function findMembreById($id) {
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$membreGateway = new MembreGateway($con);
		
		$membre = $membreGateway->findById($id);
		return $membre;
	}
	
	public function newMembre($pseudo,$mdp){
		global $dns,$user,$pass,$message;
		$con = new Connection($dns,$user,$pass);
		$membreGateway = new MembreGateway($con);
		if($membreGateway->findByPseudo($pseudo)!=NULL){
			return "ErrPseudoExist";
		}
		$membre = new Membre($pseudo,$mdp);
		$membreGateway->newMembre($membre);
	}
	
	public function updateMembrePseudo($pseudo,$mdp, $nouv_pseudo){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$membreGateway = new MembreGateway($con);
		
		$membre = new Membre($pseudo,$mdp);
		$membreGateway->updateMembrePseudo($membre,$nouv_pseudo);	
	}
	
	public function deleteMembre($pseudo,$mdp){
		global $dns,$user,$pass;
		$con = new Connection($dns,$user,$pass);
		$membreGateway = new MembreGateway($con);
		
		$membre = new Membre($pseudo,$mdp);
		$membreGateway->deleteMembre($membre);	
	}
}
?>