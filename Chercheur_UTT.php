<?php
class Chercheur_UTT extends Auteur{

private $login;
private $MDP;
    
function __construct ($nom,$deppartement,$login,$MDP){
    
    //fonctionnalité de création du compte
    
    parent::__construct($nom,$deppartement);
    $this->universite = 'UTT';
    $this->login = $login;
    $this->MDP = $MDP;
    
}

function getuniversite(){return ('UTT');}

function Ajout_Publication(){}
function Modifier_Publication(){}
function Afficher_Publications(){}
 
}
