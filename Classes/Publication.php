<?php
    class Publication {

        private $auteurs;
        private $titre;
        private $ref;
        private $annee;
        private $statut;
    
        public function __construct($auteurs, $titre, $ref, $annee, $statut) {
            $this->auteurs = $auteurs;
            $this->titre = $titre;
            $this->ref = $ref;
            $this->annee = $annee;
            $this->statut = $statut;
        }
    
        public function getAuteurs(){return $this->auteurs;}
        public function setAuteurs($auteurs){$this->auteurs = $auteurs;}
    
        public function getTitre(){return $this->titre;}
        public function setTitre($titre){$this->titre = $titre;}

        public function getRef(){return $this->ref;}
        public function setRef($ref){$this->ref = $ref;}

        public function getAnnee(){return $this->annee;}
        public function setAnnee($annee){$this->annee = $annee;}

        public function getStatut(){return $this->statut;}
        public function setStatut($statut){$this->statut = $statut;}

    }
?>
