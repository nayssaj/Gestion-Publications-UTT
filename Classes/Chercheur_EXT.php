<?php
    class Chercheur_Ext extends Auteur{

        private $universite;

        function __construct ($nom,$deppartement,$universite){
            parent::__construct($nom,$deppartement);
            $this->universite = $universite;
        }

        function getUniversite(){return ($this->universite);}
        function setUniversite($universite){$this->universite = $universite;}
    
    }
?>
