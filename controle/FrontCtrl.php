<?php
class FrontCtrl{
	
	function __construct(){
		
		try {
			global $rep,$vues;
			$message=[];

					
			
			$liste_actions_Membre = ['sedeconnecter','affichertoutesleslistes','ajouterlistepriv','modifierlistepriv','supprimerlistepriv','recherchertoutesleslistes'];

			if(isset($_REQUEST['action'])){
				$action = $_REQUEST['action'];			
			}else $action = NULL;
			
			$model = new MdlMembre();
			$membre = $model->isMembre();
			
			if(in_array($action,$liste_actions_Membre)){
				if($membre == NULL){
					require($rep.$vues['seconnecter']);	
				}
				else {
					$ctrl_membre = new CtrlMembre();
				}
			}else{
				$ctrl_utilisateur = new CtrlUtilisateur($action);
			}

		}catch(Exception $e){
			$message[]="erreur inattendu!! => ".$e;
			require($rep.$vues['erreur']);
		}
	}
}

?>