<?php

    require_once 'vue/Vue.php';

    class ControlerModificationPublication{

        public function modificationPublication(){

            $vue = new Vue('ModificationPublication');
            $donneesSpecifiques = array('titrePage' => 'Modifier une publication');
            $vue->generer($donneesSpecifiques);

        }
    }


