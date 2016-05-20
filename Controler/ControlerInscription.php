<?php
	require_once('../Classes/Publication.php');
	require_once('../Classes/Chercheur.php');
	//require_once('../Vue/vue.php');

	class ControlerInscription{

		private $publication;

		public function __construct(){
			$this->publication = new Publication();
		}

		public function Inscription(){
		//	$publication = $this->publication->getPublication($isBillet);
		//	$vue = new Vue('Publication');
		//	$vue->generer($publication);

            if(isset($_SESSION["login"]) && isset($_SESSION["mdp"])){
            }
            else{if(isset($_POST[nom]) && isset($_POST[prenom]) && isset($_POST[equipe]) && isset($_POST[login]) && isset($_POST[mdp])){
                    if(strlen($_POST[mdp])>6 ){ //ajouter les vérif d'existance login,nom et prenom 
                    //créer les éléments dans la BDD
                   // foreach ($_POST as $ele){
                   //     echo $ele;
                   //     echo ("<br/>");
                   // }
                    }
                }
            }
            
    }
}
