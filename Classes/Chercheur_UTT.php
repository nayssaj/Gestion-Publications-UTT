<?php

	require_once 'Database.php';	
	//S'assurer nécéssaire de faire ce require
	require_once 'Chercheur.php';

	class Chercheur_UTT extends Chercheur{

        	private $login;
        	private $MDP;
    
        	public function __construct ($id, $nom, $prenom, $organisation, $equipe, $login, $MDP){
    
        	//fonctionnalité de création du compte
            		parent::__construct($id, $nom, $prenom, 'UTT', $equipe);
            		$this->login = $login;
            		$this->MDP = $MDP;
        	}

		public function ajoutPublication($titre_article, $reference_publication, $annee, $categorie, $lieu, $statut){
			try{
				$db = Database::getInstance();
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());	
			}
			$req = $db->prepare('INSERT INTO Publication(id, titre_article, reference_publication, annee, categorie, lieu, statut) VALUES(:id, :titre_article, :reference_publication, :annee, :categorie, :lieu, :statut)');
			$req->execute(array(
				'id' => NULL,
				'titre_article' => $titre_article,
				'reference_publication' => $reference_publication,
				'annee' => $annee,
				'categorie' => $categorie,
				'lieu' => $lieu,
				'statut' => $statut
			));
		}

        	public function modifierPublication(){}
    	}
?>
