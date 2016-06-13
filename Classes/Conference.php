<?php
    
    require_once('Classes/Publication.php');

    class Conference extends Publication{

        private $lieu;
 
        public function __construct($id, $auteurs, $titre, $ref, $annee, $statut, $type, $lieu){
            parent::__construct($id, $auteurs, $titre, $ref, $annee, $statut, $type);
            $this->lieu = $lieu;
        }
        
        public function getLieu(){return $this->lieu;}
        public function setLieu($lieu){$this->lieu = $lieu;}
    }
