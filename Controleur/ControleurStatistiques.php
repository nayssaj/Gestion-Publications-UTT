<?php
    require_once 'ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur.php';
    require_once 'Classes/Administrateur.php';

    class ControleurStatistiques extends ControleurSecurise{

        private $chercheur;
        private $publication;

        public function __construct(){
            $this->chercheur = new Chercheur(null, 'michel', 'dupont', 'UTT', 'equipe');
            $auteurs = array($this->chercheur);
            $this->publication = new Publication(null, $auteurs, 'titre', 'ref', 'annee', 'statut', 'type'); 
        }

        public function index(){
            
            $admin = new Administrateur();
            $this->genererVue(array('admin' => $admin->statistiquesChercheurs()));
        }
    }
