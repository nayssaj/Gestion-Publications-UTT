<?php
class Auteur {
    
private $nom;
private $departement;

function __construct ($nom,$departement){
   $this->nom=$nom;
   $this->departement=$departement;
}

function getnom(){return ($this->nom);}
function setnom($nom){$this->nom = $nom;}

function getdepartement(){return ($this->departement);}
function setdepartement($departement){$this->departement = $departement;}
 
}
