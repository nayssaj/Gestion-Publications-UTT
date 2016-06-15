<?php
	require_once('Chercheur.php');

	class Chercheur_UTT extends Chercheur{

        	private $login;
        	private $mdp;

                public function getLogin(){
                    return $this->login;
                }

                public function getMdp(){
                    return $this->mdp;
                }
    
        	public function __construct ($id, $nom, $prenom, $equipe, $login, $mdp){
    
        	//fonctionnalité de création du compte
            		parent::__construct($id, $nom, $prenom, 'UTT', $equipe);
            		$this->login = $login;
            		$this->mdp= $mdp;
        	}

		public function ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu = null, $statut){
                        $publicationInseree = new Publication(null, $auteurs, $titre_article, $reference_publication, $annee, $statut, $categorie, $lieu);
                        if($this->verificationPublicationBase($publicationInseree)){
                            throw new Exception("Publication déja présente");
                        }
			//On insère d'abord la publication dans la table Publication
                        $reqInsertion= 'INSERT INTO Publication(id, titre_article, reference_publication, annee, categorie, lieu, statut, date_ajout) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
                        $this->executerRequete($reqInsertion, array(NULL, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut, date("Y-m-d"))); 
                        //On récupère l'id de la publication que l'on viens d'inserer
                        $reqIdPublication = 'SELECT LAST_INSERT_ID()'; 
                        $idPublications = $this->executerRequete($reqIdPublication);
                        $idPublication = $idPublications->fetch()[0];
                        //On insère dans la table rédige les couples idAuteur/idPublication
                        $place = 1;
			foreach($auteurs as $auteur){
                            //On verifie que l'auteur n'est pas déja présent dans la BDD
                            //Si il ne l'est pas on l'ajoute
                            if(!$this->verificationAuteurBase($auteur)){
                                $this->ajouterChercheur($auteur);
                                //On récupère l'ID de l'auteur que l'on viens d'inserer
                                $reqIdAuteur = 'SELECT LAST_INSERT_ID()';
                                $idAuteurs = $this->executerRequete($reqIdAuteur);
                                $idAuteur = $idAuteurs->fetch()[0];
                            }
                            //Si il ne l'est pas on recupère son id
                            else{
                                $idAuteur = $this->verificationAuteurBase($auteur);
                            }
		            $reqInsRedige = 'INSERT INTO redige(Publication_id, Auteur_id, place) VALUES(?, ?, ?)'; 
			    $this->executerRequete($reqInsRedige, array($idPublication, $idAuteur, $place));
                            $place++;
			}
		}
                

		public function modifierLabelPublication(Publication $publication, $label){
                        if($publication->getStatut() != $label){
			    $sql = 'UPDATE Publication SET reference_publication = ? WHERE id = ?';
			    $this->executerRequete($sql, array($label, $publication->getId()));
                        }
		}

		public function modifierStatutPublication(Publication $publication, $statut){
                        if($publication->getStatut() != $statut){
			    $sql = 'UPDATE Publication SET statut = ? WHERE id = ?';
			    $this->executerRequete($sql, array($statut, $publication->getId()));
                        }
		}

		public function modifierTitrePublication(Publication $publication, $titre){
			if($publication->getTitre() != $titre){
			    $sql = 'UPDATE Publication SET titre_article = ? WHERE id = ?';
			    $this->executerRequete($sql, array($titre, $publication->getId()));
			}
		}

                public function ajouterChercheur(Chercheur $chercheur){
                    //Verifier que l'auteur n'est pas déja présent dans la base
                    if(!$this->verificationAuteurBase($chercheur)){
                        $sql = 'INSERT INTO Auteur(id, organisation, equipe, nom, prenom) VALUES (?, ?, ?, ?, ?)';
                        $this->executerRequete($sql, array(NULL, $chercheur->getOrganisation(), $chercheur->getEquipe(), $chercheur->getNom(), $chercheur->getPrenom()));
                        $reqIdChercheur = 'SELECT LAST_INSERT_ID()';
                        $repIdChercheur = $this->executerRequete($reqIdChercheur);
                        $idChercheur = $repIdChercheur->fetch()[0];
                        $chercheur->setId($idChercheur);
                    }
                    else{
                        $chercheur->setId($this->verificationAuteurBase($chercheur));
                    }
		}

		public function ajouterAuteurPublication(Publication $publication, Chercheur $chercheur){
			//On verifie que l'auteur n'est pas déja indiqué dans la liste des auteurs
			if(!$publication->verificationAuteur($chercheur)){
			    $sql = 'INSERT INTO redige(Publication_id, Auteur_id, place) VALUES (?, ?, ?)';
			    $this->executerRequete($sql, array($publication->getId(), $chercheur->getId(), 0));
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

                public function setPlaceAuteur(Publication $publication, Chercheur $chercheur, $place){
                    $sql = "UPDATE redige SET place = ? WHERE Publication_id = ? AND Auteur_id = ?";
                    $resultat = $this->executerRequete($sql, array($place, $publication->getId(), $chercheur->getId()));
                }

                public function verificationAuteurBase(Chercheur $chercheur){
                    $sql= 'SELECT * FROM Auteur WHERE organisation = ? AND equipe = ? AND nom = ? AND prenom = ?';
                    $resultat = $this->executerRequete($sql, array($chercheur->getOrganisation(), $chercheur->getEquipe(), $chercheur->getNom(), $chercheur->getPrenom()));
                    $auteurPresent = $resultat->fetch();
                    if($auteurPresent)
                        return $auteurPresent['id'];
                    else        
                        return 0;
                }
                
                public function verificationPublicationBase(Publication $publication){
                    if($publication->getLieu() == null){
                        $sql= 'SELECT * FROM Publication WHERE titre_article = ? AND reference_publication = ? AND categorie = ? AND annee = ? AND lieu IS NULL AND statut = ?';
                        $resultat = $this->executerRequete($sql, array($publication ->getTitre(), $publication->getRef(), $publication->getType(), $publication->getAnnee(), $publication->getStatut()));
                    }
                    else{
                        $sql= 'SELECT * FROM Publication WHERE titre_article = ? AND reference_publication = ? AND categorie = ? AND annee = ? AND lieu = ? AND statut = ?';
                        $resultat = $this->executerRequete($sql, array($publication ->getTitre(), $publication->getRef(), $publication->getType(), $publication->getAnnee(), $publication->getLieu(), $publication->getStatut()));
                    }
                    $publicationPresente = $resultat->fetch();
                    if($publicationPresente)
                        return $publicationPresente['id'];
                    else        
                        return 0;
                }

    	}
?>
