<?php

    require_once 'Controleur/ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur.php';

    class ControleurModificationPublication extends ControleurSecurise{

        private $publications;
        private $chercheur;
        
        function __Construct(){    
            $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe');
            $this->chercheur1 = new Chercheur('2222', 'bobi', 'basqd', 'UTT', 'aquipe');
                $this->publications = new Publication('1', array($this->chercheur,$this->chercheur1), 'titre', 'ref', 'annee', 'statut', 'type');
                //print_r($this->publications->getAuteurs());
        }
        
        public function index(){
            $lapubli = $this->publications->getPublicationID($this->requete->getParametre('id'));
            $this->genererVue(array('titrePage' => 'Modifier une publication','auteurs_publi' => $lapubli->getAuteurs() ));
        }

        public function modificationPublication(){
        }
    }


