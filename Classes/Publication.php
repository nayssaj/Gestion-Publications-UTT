<?php
    abstract class Publication {

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
    
        function getAuteurs(){return $this->auteurs;}
        function setAuteurs($auteurs){$this->auteurs = $auteurs;}
    
        function getTitre(){return $this->titre;}
        function setTitre($titre){$this->titre = $titre;}

        function getRef(){return $this->ref;}
        function setRef($ref){$this->ref = $ref;}

        function getAnnee(){return $this->annee;}
        function setAnnee($annee){$this->annee = $annee;}

        function getStatut(){return $this->statut;}
        function setStatut($statut){$this->statut = $statut;}

    }
?>
