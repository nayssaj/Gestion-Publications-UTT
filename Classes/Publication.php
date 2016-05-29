<?php

    require_once 'Core/Modele.php';

    class Publication extends Modele{

	private $id;
        private $auteurs = array();
        private $titre;
        private $ref;
        private $annee;
        private $statut;
    
        public function __construct($id, $auteurs, $titre, $ref, $annee, $statut, $type) {
		$this->id = $id;	
        	$this->auteurs = $auteurs;
		$this->titre = $titre;
		$this->ref = $ref;
		$this->annee = $annee;
		$this->statut = $statut;
                $this->type = $type;
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
            $publication = $this->executerRequete($sql, array($idPublication));
            if($publication->rowCount() == 1)
                return $publication->fetch();
            else
                throw new Exception("Aucune publication ne correspond a l'identifiant '$idPublication'");
        }

        public function getNombrePublications(){
            $sql = 'SELECT count(*) as nbPublications FROM Publication';
            $resultat = $this->executerRequete($sql);
            $ligne = $resultat->fetch();
            return $ligne['nbPublications'];
        }
    }

    

