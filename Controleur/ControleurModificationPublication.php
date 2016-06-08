<?php

    require_once 'Controleur/ControleurSecurise.php';

    class ControleurModificationPublication extends ControleurSecurise{

        public function index(){
            $this->genererVue(array('titrePage' => 'Modifier une publication'));
        }

        public function modificationPublication(){

        }
    }


