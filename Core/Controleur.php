<?php
    
    require_once 'Requete.php';
    require_once 'Core/Vue.php';

    abstract class Controleur{

        //Action a réaliser
        private $action;

        //Requete entrante
        protected $requete;

        //Définit la requete entrante 
        public function setRequete(Requete $requete){
            $this->requete = $requete;
        }

        //Execute l'action a réaliser
        public function executerAction($action){
            if(method_exists($this, $action)){
                $this->action = $action;
                $this->{$this->action}();
            }
            else{
                $classeControleur = get_class($this);
                throw new Exception("Action '$action' non définie dans la classe '$classeControleur'");
            }
        }

        //Methode abstraite correspondant a l'action par défaut
        //Les classes dérivées doivent implémenter cette action par défaut 
        public abstract function index();

        //Génère la vue associée au controleur courant
        protected function genererVue($donneesVue = array()){
            //Determination du nom du fichier vue à partir du nom du controleur actuel
            $classeControleur = get_class($this);
            $controleur = str_replace("Controleur", "", $classeControleur);
            //Instanciation et génération de la vue
            $vue = new Vue($this->action, $controleur);
            $vue->generer($donneesVue);
        } 
    }
