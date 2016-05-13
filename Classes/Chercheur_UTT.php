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

		public function ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $statut){
			try{
				$db = Database::getInstance();
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());	
			}
			$req = $bdd->prepare('INSERT INTO Publication(titre_article, reference_publication, annee, categorie, lieu, statut) VALUES(:titre_article, :reference_publication, :annee, :categorie, :lieu, :statut)');
			$req->execute(array(
				'titre_article' => $titre_article,
				'reference_publication' => $reference_publication,
				'annee' => $annee,
				'categorie' => $categorie,
				'lieu' => $lieu,
				'statut' => $statut
			));
			echo 'jeu ajouté';
		}
        	public function modifierPublication(){}
    	}
?>
