<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
/*
    require_once 'Controler/Routeur.php';
    
    $routeur = new Routeur();
    $routeur->routerRequete();
 */
    require_once 'vue/Vue.php';
    require_once 'Classes/Chercheur.php';
    $michel = new Chercheur(3, 'michel', 'dupont', 'UTT', 'equipe');
    $publications = $michel->getPublication();

    $vue = new Vue("AjoutPublication");
    $donneesSpecifiques = array('titrePage' => "Ajouter une publication");
    $vue->generer($donneesSpecifiques);
