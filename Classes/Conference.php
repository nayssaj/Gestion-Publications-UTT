<?php
    class Conference extends Publication{

        private $lieu;
        private $type;
 
        public function __construct($id, $auteurs, $titre, $ref, $annee, $statut, $lieu, $type){
            parent::__construct($id, $auteurs, $titre, $ref, $annee, $statut,$type);
            $this->lieu = $lieu;
        }
        
        public function getLieu(){return $this->lieu;}
        public function setLieu($lieu){$this->lieu = $lieu;}
    }
?>
