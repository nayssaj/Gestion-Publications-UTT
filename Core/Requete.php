<?php
    
    require_once 'Session.php';

    class Requete{

        private $parametres;
        private $session;

        public function __construct($parametres){
            $this->parametres = $parametres;
            $this->session = new Session();
        }

        //Renvoi vrai si le parametre existe dans la requête
        public function existeParametre($nom){
            return (isset($this->parametres[$nom]) && $this->parametres[$nom] != '');
        }
        
        //Renvoi la valeur du parametre demandé
        //Lève une exception si le parametre est introuvable
        public function getParametre($nom){
            if($this->existeParametre($nom)){
                return $this->parametres[$nom];
            }
            else{
                throw new Exception("Le parametre '$nom' absent de la requete");
            }
        }

        public function getSession(){
            return $this->session;
        }
    }
