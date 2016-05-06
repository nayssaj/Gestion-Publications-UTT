<?php
class Chercheur_Ext extends Auteur{

private $universite;

function __construct ($nom,$deppartement,$universite){
    
    parent::__construct($nom,$deppartement);
    $this->universite = $universite;
    
}
function getuniversite(){return ($this->universite);}
function setuniversite($universite){$this->universite = $universite;}
    
}