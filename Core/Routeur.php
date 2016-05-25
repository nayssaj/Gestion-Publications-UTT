<?php   

    require_once 'vue/Vue.php';
    require_once 'Requete.php';

    class Routeur{

        private $ctrlAccueil;
        private $ctrlPublication;
        private $ctrlAjoutPublication;
        private $ctrlModificationPublication;
        private $ctrlInscription;

        public function __construct(){
            $this->ctrlAccueil = new ControleurAccueil();
            $this->ctrlPublication = new ControlerPublication();
            $this->ctrlAjoutPublication = new ControlerAjoutPublication();
            $this->ctrlModificationPublication = new ControlerModificationPublication();
            $this->ctrlInscritpion = new ControlerInscription();
        }

        //Route une requete entrante : execute l'action associée
        public function routerRequete(){
            try{
                //Fusion des parametres GET et POST de la requete
                $requete = new Requete(array_merge($_GET, $_POST));  

                $controleur = $this->creerControleur($requete);
                $action = $this->creeAction($requete);

                $controleur->executerAction($action);
            }
            catch(Exception $e){
                $this->gererErreur($e);
            }
        }
                
        //Crée le controleur approprié en fonction de la requete reçue
        private function creerControleur(Requete $requete){
            $controleur = "Accueil";//Controleur par défaut
            if($requete->existeParametre('controleur')){
                $controleur = $requete->getParametres('controleur');
                //Première lettre en majuscule
                $controleur = ucfirst(strtolower($controleur));
            } 
            //Creation du fichier controleur
            $classeControleur = "Controleur" . $controleur;
            $fichierControleur = 'Controleur/' . $classeControleuri . 'php';
            if(file_exists($fichierControleur)){
                //Instanciation du controleur adapté a la requête
                require($fichierControleur);
                $controleur = new $classeControleur();
                $controleur->setRequete($requete);
                return $controleur;
            }
            else{
                throw new Exception("Fichier '$fichierControleur' introuvable");
            }
        }

        //Determine l'action a executer en fonction de la requete reçue 
        private function creerAction(Requete $requete){
            $action = "index"; //Action par défaut
            if($requete->existeRequete('action')){
                $action = $requete->getParametres('action');
            }
            return $action;
        }

        private function gererErreur(Exception $exception){
            $vue = new Vue('Erreur'); 
            $vue->generer(array('msgErreur' => $exception->getMessage()));
        }
    }

