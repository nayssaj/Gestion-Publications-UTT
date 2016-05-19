<?php
    class Conference extends Publication{

        private $lieu;
        private $type;
 
        public function __construct($id, $auteurs, $titre, $ref, $annee, $statut, $lieu, $type){
            parent::__construct($id, $auteurs, $titre, $ref, $annee, $statut);
            $this->type = $type;
            $this->lieu = $lieu;
        }

        public function getType(){return $this->type;}
        public function setType($type){
            if($type=='CI' || $type=='CF'){
                $this->type = $type;
            }
        }
        
        public function getLieu(){return $this->lieu;}
        public function setLieu($lieu){$this->lieu = $lieu;}
    }
?>
