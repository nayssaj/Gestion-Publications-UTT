<?php
    class Auteur {
    
        private $nom;
        private $departement;

        function __construct ($nom,$departement){
            $this->nom = $nom;
            $this->departement = $departement;
        }

        function getNom(){return ($this->nom);}
        function setNom($nom){$this->nom = $nom;}

        function getDepartement(){return ($this->departement);}
        function setDepartement($departement){$this->departement = $departement;}
 
    }
?>
