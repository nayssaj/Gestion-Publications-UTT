<?php
    
    require_once 'Core/Controleur.php';

    abstract class ControleurSecurise extends Controleur{

        public function executerAction($action){
            //Verifie si les infos de l'utilisateur sont présentes dans la session
            //Si oui l'action continue normalement
            //Sinon l'utilisateur est redirigé vers une page de connection
            if($this->requete->getSession()->existeAttribut("idUtilisateur")){
                parent::executerAction($action);
            }
            else{
                $this->rediriger("accueil"); 
            }
        }
    }
