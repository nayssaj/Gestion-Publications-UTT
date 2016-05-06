<?php
class Conference extends Publication{

    private $lieu;
    private $type;
    //put your code here
 
    public function __construct($auteurs,$titre,$ref,$annee,$statut,$lieu,$type){
        parent::__construct($auteurs,$titre,$ref,$annee,$statut);
        $this->type = $type;
        $this->lieu = $lieu;
}

    public function gettype(){return $this->type;}
    public function settype($type){
        if($type=='CI' || $type=='CF'){
            $this->type = $type;
        }
    }
    public function getlieu(){return $this->lieu;}
    public function setlieu($lieu){$this->lieu = $lieu;}



}
