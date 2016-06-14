<?php

    require_once 'Core/Controleur.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur_UTT.php';

    class ControleurPublicationSpecifique extends Controleur{

        private $chercheur;
        private $publication1;
        
        function __Construct(){    
            $this->chercheur = new Chercheur_UTT('1', 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');
            $this->publication1 = new Publication('1', array($this->chercheur), 'titre', 'ref', 'annee', 'statut', 'type',null);
        }
        
        public function index(){
            $publication2 = $this->publication1->getPublicationID($this->requete->getParametre('id'));
            $this->genererVue(array('titrePage' => $publication2->getTitre(), 'publication' => $publication2, 'Auteur' => $publication2->getAuteurs()));
        }
    }


