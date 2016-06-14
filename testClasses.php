<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require_once 'Classes/Chercheur.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Conference.php';
    $jg = new Chercheur(1, 'nom', 'prenom', 'orga', 'equipe');
    $chercheurs[] = $jg;
    $astrapi= new Publication(1, $chercheurs, 'astrapi', 'ref', '2016', 'statut', 'type');
    $astrapi->creerConference();
    

