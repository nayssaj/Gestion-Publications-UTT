<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require 'Core/Routeur.php';
    
    $routeur = new Routeur();
    $routeur->routerRequete();
