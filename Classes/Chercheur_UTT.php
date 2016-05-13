<?php

	require_once 'Database.php';	

	class Chercheur_UTT extends Chercheur{

        	private $login;
        	private $MDP;
    
        	public function __construct ($id, $nom, $prenom, $organisation, $equipe, $login, $MDP){
    
        	//fonctionnalité de création du compte
            		parent::__construct($$id, $nom, $prenom, 'UTT', $equipe);
            		$this->login = $login;
            		$this->MDP = $MDP;
        	}

		public function ajoutPublication($auteurs, $document, $titreArticle, $ref_Publication, $annee, $categorie, $statut){
			$db = Database::getInstance();
		}

        	public function modifierPublication(){}
    	}
?>
