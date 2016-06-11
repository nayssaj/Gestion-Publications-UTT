<?php
    require_once('Classes/Publication.php');
    require_once('Classes/Chercheur.php');
    require_once 'Core/Vue.php';
    require_once 'Core/Controleur.php';
    //require_once('../Vue/vue.php');

    class ControleurProfil extends Controleur{

            private $chercheur;

            public function __construct(){
            }
            
            public function index(){
                $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe');
                //$idChercheur = $this->chercheur->getId();
                $idChercheur = $this->requete->getParametre('id');
                $nomChercheur = $this->chercheur->getChercheur($idChercheur)->getNom();
                $prenomChercheur = $this->chercheur->getChercheur($idChercheur)->getPrenom();
                $titrePage = 'Votre profil : ' . $prenomChercheur . ' ' .$nomChercheur;
                $donneesSpecifiques = array('auteur' => $this->chercheur->getChercheur($idChercheur),'titrePage' => $titrePage,'publicationsAuteur' => $this->chercheur->getChercheur($idChercheur)->getPublications($idChercheur));
                $vue = new Vue('Profil/index');
                $vue->generer($donneesSpecifiques,'profil');

            }
    }