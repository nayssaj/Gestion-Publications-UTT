<?php
    require_once 'ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur.php';

    class ControleurAdmin extends ControleurSecurise{

        private $chercheur;
        private $publication;

        public function __construct(){
            $this->chercheur = new Chercheur(null, 'michel', 'dupont', 'UTT', 'equipe');
            $auteurs = array($this->chercheur);
            $this->publication = new Publication(null, $auteurs, 'titre', 'ref', 'annee', 'statut', 'type'); 
        }

        public function index(){
            $nbPublications = $this->publication->getNombrePublications();
            $nbChercheurs = $this->chercheur->getNombreChercheurs();
            $login = $this->requete->getSession()->getAttribut('login');
            $this->genererVue(array('nbPublications' => $nbPublications, 'nbChercheurs' => $nbChercheurs, 'login' => $login));
        }
    }