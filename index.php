<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require 'Core/Routeur.php';
    
    $routeur = new Routeur();
    $routeur->routerRequete();
 
/*    require_once 'vue/Vue.php';
    require_once 'Classes/Chercheur.php';
    $michel = new Chercheur(3, 'michel', 'dupont', 'UTT', 'equipe');

    $vue = new Vue("Erreur");
    $donneesSpecifiques = array('titrePage' => "Wallah");
    $vue->generer($donneesSpecifiques);
 */
