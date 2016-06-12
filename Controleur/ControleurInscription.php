<?php
	require_once('Core/Controleur.php');
        require_once('Classes/Chercheur_UTT.php');
        require_once('Classes/Administrateur.php');

	class ControleurInscription extends Controleur{

            private $admin;

                public function __construct(){
                    $this->admin = new Administrateur();
                }

		public function index(){
                    try{
                        $donneesSpecifiques = array('titrePage' => 'Inscription');
                        $this->genererVue($donneesSpecifiques);
                    }
                    catch(Exception $e){
                        $msgErreur = $e->getMessage();
                        $this->genererVue($msgErreur);
                    }
                }

                public function inscrire(){
                    $nom = $this->requete->getParametre('nom');    
                    $prenom = $this->requete->getParametre('prenom');    
                    $equipe= $this->requete->getParametre('equipe');    
                    $login = $this->requete->getParametre('login');
                    $mdp= $this->requete->getParametre('mdp');
                    $nouvelUtilisateur = new Chercheur_UTT('1', $nom, $prenom, $equipe, $login, $mdp); 
                    $nouvelUtilisateur->ajouterChercheur($nouvelUtilisateur);
                    $this->admin->ajouterUtilisateur($nouvelUtilisateur); 
                    $this->rediriger('profil', null, $nouvelUtilisateur->getId());
                }
        }
