<?php   
    
    require_once 'ControlerAccueil.php';
    require_once 'ControlerPublication.php';
//    require_once 'pages/vueErreur.php';

    class Routeur{

        private $ctrlAccueil;
        private $ctrlPublication;

        public function __construct(){
            $this->ctrlAccueil = new ControleurAccueil();
            $this->ctrlPublication = new ControlerPublication();
        }

        public function routerRequete(){
                if(isset($_GET['action'])){
                    if($_GET['action'] == 'publication'){
                        $this->$ctrlPublication->publication();
                    }
                    else{
                        throw new Exception("Action non valide");
                    }
                }
                else{
                    $this->ctrlAccueil->Accueil();
                }
        }

        private function erreur($msgErreur){
            include 'pages/vueErreur.php';
        }
    }

