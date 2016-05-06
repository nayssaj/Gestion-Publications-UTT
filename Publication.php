<?php
    class Publication{
        private $titre;
        private $annee;
        private $statut;
        private $auteurs = array();

        public function setTitre($titre){
            $this->titre = $titre;
        }

        public function getTitre(){
            return $this->titre;
        }

        public function setAnnee($annee){
            $this->annee = $annee;
        }

        public function getAnnee(){
            return $this->annee;
        }

        public function setStatut($statut){
            $this->statut= $statut;
        }

        public function getStatut(){
            return $this->statut;
        }

        public function __construct($titre, $annee, $statut, $auteurs){
            $this->titre = $titre;
            $this->annee = $annee;
            $this->statut = $statut;
            $this->auteurs = $auteurs;
        }
    }
?>
