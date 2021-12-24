<?php

	class MdlMembre{
		
		public function connexion(String $pseudo, string $mdp){
			global $dns,$user,$pass,$message;
			$con = new Connection($dns,$user,$pass);
			//verif
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
					$_SESSION['mdp']=$password;
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
			if(isset($_SESSION['role']) && isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
				if($_SESSION['role']!='membre') return NULL;
			
				Verif::verif_str($_SESSION['login']);
				Verif::verif_str($_SESSION['mdp']);
			
				return new Membre($_SESSION['login'],$_SESSION['mdp']);
			}else return NULL;	
		}
		
		public function getAllMembres() : array{
			$array_membres = $memberGateway->getAllMembre();
			return $array_membres;
		}
	
		public function findMembreByPseudo($pseudo) : Membre {
			global $dns,$user,$pass;
			$con = new Connection($dns,$user,$pass);
			$membreGateway = new MembreGateway($con);
			$membre = $membreGateway->findByPseudo($pseudo);
			return $membre;
		}
	
		public function findMembreById($id) : Membre {
			$membre = $membreGateway->findById($id);
			return $membre;
		}
	
		public function newMembre($pseudo,$mdp){
			global $dns,$user,$pass,$message;
			$con = new Connection($dns,$user,$pass);
			//verif
			$membreGateway = new MembreGateway($con);
			if($membreGateway->findByPseudo($pseudo)!=NULL){
				return "ErrPseudoExist";
			}
			$membre = new Membre($pseudo,$mdp);
			$membreGateway->newMembre($membre);
		}
	
		public function updateMembrePseudo($pseudo,$mdp, $nouv_pseudo){
			$membre = new Membre($pseudo,$mdp);
			$membreGateway->updateMembrePseudo($membre,$nouv_pseudo);	
		}
	
		public function deleteMembre($pseudo,$mdp){
			$membre = new Membre($pseudo,$mdp);
			$membreGateway->deleteMembre($membre);	
		}
	
	}
?>