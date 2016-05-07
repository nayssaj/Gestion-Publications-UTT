<?php
    class Article extends Publication{

        private $type; //peut être RI/RF/OS/AP

        public function __construct($auteurs, $titre, $ref, $annee, $statut, $type){
            parent::__construct($auteurs, $titre, $ref, $annee, $statut);
            $this->type = $type;
        }
    
        public function getType(){
            return $this->type;
        }
    
        public function setType($type){
            if($type=='RI' || $type=='RF' || $type=='OS' || $type=='AP'){
                $this->type = $type;
            }
        }
    }
?>
