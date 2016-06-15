<?php
    require_once 'ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur.php';
    require_once 'Classes/Administrateur.php';

    class ControleurCoherence extends ControleurSecurise{

        private $chercheur;
        private $publication;

        public function __construct(){
            $this->chercheur = new Chercheur(null, 'nom', 'prenom', 'UTT', 'equipe');
            $auteurs = array($this->chercheur);
            $this->publication = new Publication(null, $auteurs, 'titre', 'ref', 'annee', 'statut', 'type'); 
        }

        public function index(){
            
            $monAdmin =new Administrateur();
            $result = $monAdmin->detectionCoherenceDonnees();
            
            $TitreVide = $result[0];
            $AuteurUTT = $result[1];
            $TypeVide = $result[2];
            $LieuVide = $result[3];
            
            //$nbPublications = $this->publication->getNombrePublications();
            //$nbChercheurs = $this->chercheur->getNombreChercheurs();
            //$login = $this->requete->getSession()->getAttribut('login');
            $this->genererVue(array('TitreVide' => $TitreVide, 'AuteurUTT' => $AuteurUTT, 'TypeVide' => $TypeVide, 'LieuVide' => $LieuVide));
        }
    }
