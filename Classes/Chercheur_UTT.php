<?php
    class Chercheur_UTT extends Auteur{

        private $login;
        private $MDP;
    
        function __construct ($nom, $departement, $login, $MDP){
    
        //fonctionnalité de création du compte
            parent::__construct($nom,$departement);
            $this->universite = 'UTT';
            $this->login = $login;
            $this->MDP = $MDP;
    
        }

        function getUniversite(){return ('UTT');}

        function ajoutPublication(){}
        function modifierPublication(){}
        function afficherPublications(){}
    }
?>
