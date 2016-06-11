<?php

    require_once 'Controleur/ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur_UTT.php';

    class ControleurModificationPublication extends ControleurSecurise{

        private $chercheur;
        private $publication1;
        
        function __Construct(){    
            $this->chercheur = new Chercheur_UTT('1', 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');
            $this->publication1 = new Publication('1', array($this->chercheur), 'titre', 'ref', 'annee', 'statut', 'type');
        }
        
        public function index(){
            $publication2 = $this->publication1->getPublicationID($this->requete->getParametre('id'));
            $this->genererVue(array('titrePage' => 'Modifier une publication', 'publication' => $publication2, 'auteurs_publi' => $publication2->getAuteurs()));
        }

        public function modificationPublication(){
            $publication2 = $this->publication1->getPublicationID($this->requete->getParametre('id'));
            $nouveauTitre = $this->requete->getParametre('titre');
            $this->chercheur->modifierTitrePublication($publication2, $nouveauTitre);
            $this->rediriger('profil', null, '1'); 
        }
    }


