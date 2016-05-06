<?php
abstract class Publication {
    private $auteurs;
    private $titre;
    private $ref;
    private $annee;
    private $statut;
    
    
    public function __construct($auteurs,$titre,$ref,$annee,$statut) {
        $this->auteurs = $auteurs;
        $this->titre = $titre;
        $this->ref = $ref;
        $this->annee = $annee;
        $this->statut = $statut;
    }
    
function getauteurs(){return $this->auteurs;}
function setauteurs($auteurs){$this->auteurs = $auteurs;}
    
function gettitre(){return $this->titre;}
function settitre($titre){$this->titre = $titre;}

function getref(){return $this->ref;}
function setref($ref){$this->ref = $ref;}

function getannee(){return $this->annee;}
function setannee($annee){$this->annee = $annee;}

function getstatut(){return $this->statut;}
function setstatut($statut){$this->statut = $statut;}

}
