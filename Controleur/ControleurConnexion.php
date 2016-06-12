<?php
    
    require_once 'Core/Controleur.php';
    require_once 'Classes/Utilisateur.php';

    class ControleurConnexion extends Controleur{

        private $utilisateur;

        public function __construct(){
            $this->utilisateur = new Utilisateur();
        }

        public function index(){
            $this->genererVue();
        }

        public function connecter(){
            if($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")){
                $login = $this->requete->getParametre("login");
                $mdp = $this->requete->getParametre("mdp");
                if($this->utilisateur->connecter($login, $mdp)){
                    $utilisateur = $this->utilisateur->getUtilisateur($login, $mdp);
                    $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['utilisateur_id']);
                    $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                    $idUtilisateur = $this->requete->getSession()->getAttribut('idUtilisateur');
                    $this->rediriger('profil', null, $idUtilisateur);
                }
                else{
                    throw new Exception("Combinaison login mot de passe incorrect"); 
                }
            }
            else{
                throw new Exception("Action impossible : login ou mot de passe non défini");
            }
        }

        public function deconnecter(){
            $this->requete->getSession()->detruire();
            $this->rediriger("accueil");
        }
    }
