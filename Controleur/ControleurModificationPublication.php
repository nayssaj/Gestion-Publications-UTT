<?php

    require_once 'Core/Controleur.php';

    class ControleurModificationPublication extends Controleur{

        public function index(){
            $this->genererVue(array('titrePage' => 'Modifier une publication'));
        }

        public function modificationPublication(){
        }
    }


