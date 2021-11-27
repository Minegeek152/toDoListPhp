<?php
class FrontControleur{

	

	function __construct(){
		global $rep,$vues;

		$dVueErreur=[];

		try{
			$action=$_REQUEST['action'];
			switch ($action) {
				case NULL:
					$this->reinit();
					break;
				
				default:
					$dVueErreur[]="Erreur appel php";
					require($rep.$vues['accueil']);
					break;
			} 
		}catch(PDOException $e){     //Erreur BDD

			$dVueErreur[]="Erreur inattendue";
			require($rep.$vues['erreur']);
		}
		catch(Exception $e){        //Erreur autre
			$dVueErreur[]="Erreur inattendue";
			require($rep.$vues['erreur']);
		}      

		exit(0);

	}


}




?>