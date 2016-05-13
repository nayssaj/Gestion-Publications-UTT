<?php

	require_once 'Database.php';	
	//S'assurer qu'il est nécéssaire de faire ce require
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

		public function ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut){
			try{
				$db = Database::getInstance();
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());	
			}
			//On insère d'abord la publication dans la table Publication
			$reqInsPublication = $db->prepare('INSERT INTO Publication(id, titre_article, reference_publication, annee, categorie, lieu, statut) VALUES(:id, :titre_article, :reference_publication, :annee, :categorie, :lieu, :statut)');
			$reqInsPublication->execute(array(
				//Ici id est définit dans la table comme auto-incrémenté, 
				//sa valeur sera automatiquement attribuée, on indique donc NULL
				'id' => NULL,
				'titre_article' => $titre_article,
				'reference_publication' => $reference_publication,
				'annee' => $annee,
				'categorie' => $categorie,
				'lieu' => $lieu,
				'statut' => $statut
			));
			//On récupère l'id de la publication que l'on viens d'inserer
			$reqIdPublication = $db->query('SELECT LAST_INSERT_ID()'); 
			$idPublication = $reqIdPublication->fetch()[0];
			//On insère dans la table rédige les couples idAuteur/idPublication
			foreach($auteurs as $auteur){
				$idAuteur = $auteur->getId();
				$reqInsRedige = $db->prepare('INSERT INTO redige(Publication_id, Auteur_id) VALUES(:idPublication, :idAuteur)'); 
				$reqInsRedige->execute(array(
					'idPublication' => $idPublication,
				       	'idAuteur' => $idAuteur	
				));	
			}
		}

		public function modifierStatutPublication(Publication $publication, $statut){
			try{
				if(!$publication->verificationAuteur($this)){
					throw new Exception('Vous n\'etes pas auteur de ce fichier');	
				}
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			}	
			if($publication->getStatut() != $statut){
				try{
					$db = Database::getInstance();
				}
				catch(Exception $e){
					die('Erreur : ' . $e->getMessage());	
				} 
				$req = $db->prepare('UPDATE Publication SET statut = :nvStatut WHERE id = :idPublication');
				$req->execute(array(
					'nvStatut' => $statut,
					'idPublication' => 1 
				));
			}
		}

		public function modifierTitrePublication(Publication $publication, $titre){
			try{
				if(!$publication->verificationAuteur($this)){
					throw new Exception('Vous n\'etes pas auteur de ce fichier');	
				}
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			}	
			if($publication->getTitre() != $statut){
				try{
					$db = Database::getInstance();
				}
				catch(Exception $e){
					die('Erreur : ' . $e->getMessage());	
				} 
				$req = $db->prepare('UPDATE Publication SET titre_article = :nvTitre WHERE id = :idPublication');
				$req->execute(array(
					'nvTitre' => $titre,
					'idPublication' => $publication->getId() 
				));
			}
		}

		public function modifierPublication(){}
    	}
?>
