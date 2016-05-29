<?php
	require_once('Chercheur.php');

	class Chercheur_UTT extends Chercheur{

        	private $login;
        	private $MDP;
    
        	public function __construct ($id, $nom, $prenom, $equipe, $login, $MDP){
    
        	//fonctionnalité de création du compte
            		parent::__construct($id, $nom, $prenom, 'UTT', $equipe);
            		$this->login = $login;
            		$this->MDP = $MDP;
        	}

		public function ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut){
			//On insère d'abord la publication dans la table Publication
                        $reqInsertion= 'INSERT INTO Publication(id, titre_article, reference_publication, annee, categorie, lieu, statut) VALUES(?, ?, ?, ?, ?, ?, ?)';
                        $this->executerRequete($reqInsertion, array(NULL, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut)); 
			//On récupère l'id de la publication que l'on viens d'inserer
			$reqIdPublication = 'SELECT LAST_INSERT_ID()'; 
                        $idPublications = $this->executerRequete($reqIdPublication);
			$idPublication = $idPublications->fetch()[0];
			//On insère dans la table rédige les couples idAuteur/idPublication
			foreach($auteurs as $auteur){
                                $this->ajouterChercheur($auteur);
                                //On récupère l'ID de l'auteur que l'on viens d'inserer
                                $reqIdAuteur = 'SELECT LAST_INSERT_ID()';
                                $idAuteurs = $this->executerRequete($reqIdAuteur);
                                $idAuteur = $idAuteurs->fetch()[0];
				$reqInsRedige = 'INSERT INTO redige(Publication_id, Auteur_id) VALUES(?, ?)'; 
				$this->executerRequete($reqInsRedige, array($idPublication, $idAuteur));
			}
		}
                

		public function modifierStatutPublication(Publication $publication, $statut){
			if(!$publication->verificationAuteur($this)){
		            throw new Exception('Vous n\'etes pas auteur de ce fichier');	
			}
                        if($publication->getStatut() != $statut){
			    $sql = 'UPDATE Publication SET statut = ? WHERE id = ?';
			    $this->executerRequete($sql, array($statut, $publication->getId()));
                        }
		}

		public function modifierTitrePublication(Publication $publication, $titre){
			if(!$publication->verificationAuteur($this)){
		            throw new Exception('Vous n\'etes pas auteur de ce fichier');	
			}
			if($publication->getTitre() != $titre){
			    $sql = 'UPDATE Publication SET titre_article = ? WHERE id = ?';
			    $this->executerRequete($sql, array($titre, $publication->getId()));
			}
		}

                private function ajouterChercheur(Chercheur $chercheur){
			//Verifier que l'auteur n'est pas déja présent dans la base
			$sql = 'INSERT INTO Auteur(id, organisation, equipe, nom, prenom) VALUES (?, ?, ?, ?, ?)';
			$this->executerRequete($sql, array(NULL, $chercheur->getOrganisation(), $chercheur->getEquipe(), $chercheur->getNom(), $chercheur->getPrenom()));
		}

		public function ajouterAuteurPublication(Publication $publication, Chercheur $chercheur){
			if(!$publication->verificationAuteur($this)){
		            throw new Exception('Vous n\'etes pas auteur de ce fichier');	
			}
			//On verifie que l'auteur n'est pas déja indiqué dans la liste des auteurs
			if(!$publication->verificationAuteur($chercheur)){
			    $sql = 'INSERT INTO redige(Publication_id, Auteur_id) VALUES (?, ?)';
			    $this->executerRequete($sql, array($publication->getId(), $chercheur->getId()));
			}
		}

		public function retirerAuteur(Publication $publication, Chercheur $chercheur){
			if(!$publication->verificationAuteur($this)){
			    throw new Exception('Vous n\'etes pas auteur de ce fichier');	
			}
			//On verifie que l'auteur est bien présent 
			if($publication->verificationAuteur($chercheur)){
			    $sql = 'DELETE FROM redige WHERE Auteur_id = ? AND Publication_id = ?'; 
			    $this->executerRequete($sql, array($chercheur->getId(), $publication->getId()));
			}
		}

		public function modifierPublication(){}

                public function verificationAuteurBase(Chercheur $chercheur){
                    $sql= 'SELECT * FROM Auteur WHERE organisation = ? AND equipe = ? AND nom = ? AND prenom = ?';
                    $resultat= $this->executerRequete($sql, array($chercheur->getOrganisation(), $chercheur->getEquipe(), $chercheur->getNom(), $chercheur->getPrenom()));
                    $auteurPresent = $resultat->fetch();
                    return $auteurPresent;
                }
    	}
?>
