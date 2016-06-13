<?php
    
    require_once('Core/Controleur.php');
    require_once('Classes/Chercheur.php');

    class ControleurAuteur extends Controleur{

        private $chercheur;

        public function __construct(){
            $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe');
        }

        public function index(){
            $nomChercheur = $this->requete->getParametre('a2');
            $prenomChercheur = $this->requete->getParametre('a1');
            $titrePage = 'Co-Auteurs de ' . $prenomChercheur . ' '. $nomChercheur;
            $this->genererVue(array('titrePage' => $titrePage));
        }
    }
