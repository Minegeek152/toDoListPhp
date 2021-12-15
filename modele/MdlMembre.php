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
				$password = $results->getPseudo();
				if(password_verify($mdp,$password)){
					$_SESSION['role']='membre';
					$_SESSION['login']=$pseudo;	
				}else{
					return "ErrMdp";
				}
			}
			
			return "ok";
		}	
	
		public function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION = array();
		}
		
		public function isMembre() {
			if(isset($_SESSION['role']) && isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
				if($_SESSION['role']!='membre') return NULL;
			
				Verif::verif_str($_SESSION['pseudo']);
				Verif::verif_str($_SESSION['mdp']);
			
				return new Membre($_SESSION['pseudo'],$_SESSION['mdp']);
			}else return NULL;	
		}
		
		public function getAllMembres() : array{
			$array_membres = $memberGateway->getAllMembre();
			return $array_membres;
		}
	
		public function findMembreByPseudo($pseudo) : Membre {
			$membre = $memberGateway->findByPseudo($pseudo);
			return $membre;
		}
	
		public function findMembreById($id) : Membre {
			$membre = $memberGateway->findById($id);
			return $membre;
		}
	
		public function newMembre($pseudo,$mdp){
			$membre = new Membre($pseudo,$mdp);
			$memberGateway->newMembre($membre);
		}
	
		public function updateMembrePseudo($pseudo,$mdp, $nouv_pseudo){
			$membre = new Membre($pseudo,$mdp);
			$memberGateway->updateMembrePseudo($membre,$nouv_pseudo);	
		}
	
		public function deleteMembre($pseudo,$mdp){
			$membre = new Membre($pseudo,$mdp);
			$memberGateway->deleteMembre($membre);	
		}
	
	}
?>