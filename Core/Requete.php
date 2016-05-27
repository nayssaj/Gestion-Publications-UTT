<?php
    
    class Requete{

        private $parametres;

        public function __construct($parametres){
            $this->parametres = $parametres;
        }

        //Renvoi vrai si le parametre existe dans la requête
        public function existeParametre($nom){
            return (isset($this->parametres[$nom]) && $this->parametres[$nom] != '');
        }
        
        //Renvoi la valeur du parametre demandé
        //Lève une exception si le parametre est introuvable
        public function getParametres($nom){
            if($this->existeParametre($nom)){
                return $this->parametres[$nom];
            }
            else{
                throw new Exception("Le parametre '$nom' absent de la requete");
            }
        }
    }
