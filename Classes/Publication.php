<?php

    require_once 'Core/Modele.php';

    class Publication extends Modele{

	private $id;
        private $auteurs = array();
        private $titre;
        private $ref;
        private $annee;
        private $statut;
        private $lieu;
        
        public function __construct($id, $auteurs, $titre, $ref, $annee, $statut, $type, $lieu =null) {
		$this->id = $id;	
        	$this->auteurs = $auteurs;
		$this->titre = $titre;
		$this->ref = $ref;
		$this->annee = $annee;
		$this->statut = $statut;
                $this->type = $type;
                $this->lieu = $lieu;
        }
    
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}

        public function getAuteurs(){return $this->auteurs;}
	public function setAuteurs($auteur){$this->auteur = $auteur;}
    
        public function getTitre(){return $this->titre;}
        public function setTitre($titre){$this->titre = $titre;}

        public function getRef(){return $this->ref;}
        public function setRef($ref){$this->ref = $ref;}

        public function getAnnee(){return $this->annee;}
        public function setAnnee($annee){$this->annee = $annee;}

        public function getStatut(){return $this->statut;}
        public function setStatut($statut){$this->statut = $statut;}
        
        public function getType(){return $this->type;}
	public function setType($type){$this->type = $type;}
        
        public function getLieu(){return $this->lieu;}
	public function setLieu($lieu){$this->lieu = $lieu;}

	public function verificationAuteur(Chercheur $auteurIncertain){
		foreach($this->getAuteurs() as $auteurCertain){
			if($auteurCertain->getId() == $auteurIncertain->getId()){
				return true;
			}	
		}
		return false;
	}


	public function getPublicationID($idPublication){
            $sql = 'SELECT * FROM Publication WHERE id = ?';
            $reponsePublication = $this->executerRequete($sql, array($idPublication));
            if($reponsePublication->rowCount() == 1){
                while($donneesPublication = $reponsePublication->fetch()){
                    //On cherche tous les auteurs de la publication trouvée
                    $reqAuteurs = 'SELECT Auteur.* FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id = ? ORDER BY redige.place';
                    $reponseAuteurs = $this->executerRequete($reqAuteurs, array($donneesPublication['id']));
                    //On garde en mémoire la liste de tous les auteurs de la publication trouvée
                    //elle servira a créer l'objet publication associée à celle trouvée
                    while($donneesAuteurs = $reponseAuteurs->fetch()){
                        $idAuteurs[] = new Chercheur($donneesAuteurs['id'], $donneesAuteurs['nom'], $donneesAuteurs['prenom'], $donneesAuteurs['organisation'], $donneesAuteurs['equipe']);
                        }
                    $publication = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie']);
                }
                return $publication;
            }
            else
                throw new Exception("Aucune publication ne correspond a l'identifiant '$idPublication'");
        }

        public function getNombrePublications(){
            $sql = 'SELECT count(*) as nbPublications FROM Publication';
            $resultat = $this->executerRequete($sql);
            $ligne = $resultat->fetch();
            return $ligne['nbPublications'];
        }

        public function getPublicationsRecentes(){
            $reqPublications = 'SELECT Publication.* FROM Publication ORDER BY Publication.date_ajout DESC LIMIT 5'; 
            $reponsePublications = $this->executerRequete($reqPublications);
            while($donneesPublication = $reponsePublications->fetch()){
                //On cherche tous les auteurs de la publication trouvée
                $reqAuteurs = 'SELECT Auteur.* FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id = ? ORDER BY redige.place';
                $reponseAuteurs = $this->executerRequete($reqAuteurs, array($donneesPublication['id']));
                //On garde en mémoire la liste de tous les auteurs de la publication trouvée
                //elle servira a créer l'objet publication associée à celle trouvée
                while($donneesAuteurs = $reponseAuteurs->fetch()){
                    $idAuteurs[] = new Chercheur($donneesAuteurs['id'], $donneesAuteurs['nom'], $donneesAuteurs['prenom'], $donneesAuteurs['organisation'], $donneesAuteurs['equipe']);
                }
                //On viens créer un objet publication que l'on ajoute aux autres publication 
                //potentiellement déja trouvées
                if($donneesPublication['categorie'] === 'CI' || $donneesPublication['lieu'] === 'CF'){    
                    $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie'] ,$donneesPublication['lieu']);
                }
            else{    
                $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie']);
                }
                unset($idAuteurs);
            }
            return $publications;
        }           
    }

    

