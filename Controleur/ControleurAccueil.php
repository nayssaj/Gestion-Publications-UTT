<?php

    require_once 'Core/Controleur.php';
    
    class ControleurAccueil extends Controleur{

        public function index(){
            $this->genererVue();
        }
    }
