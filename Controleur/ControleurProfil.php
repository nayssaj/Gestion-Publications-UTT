<?php
    require_once('Classes/Publication.php');
    require_once('Classes/Chercheur.php');
    require_once 'Core/Vue.php';
    require_once 'Core/Controleur.php';
    require_once 'Controleur/ControleurSecurise.php';

    class ControleurProfil extends ControleurSecurise{

            private $chercheur;

            public function __construct(){
            }
            
            public function index(){
                $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe');
                $idChercheur = $this->requete->getSession()->getAttribut('idUtilisateur');
                $nomChercheur = $this->chercheur->getChercheur($idChercheur)->getNom();
                $prenomChercheur = $this->chercheur->getChercheur($idChercheur)->getPrenom();
                $titrePage = $prenomChercheur . ' ' .$nomChercheur;
                $donneesSpecifiques = array('auteur' => $this->chercheur->getChercheur($idChercheur),'titrePage' => $titrePage,'publicationsAuteur' => $this->chercheur->getChercheur($idChercheur)->getPublications($idChercheur));
                $this->genererVue($donneesSpecifiques);
            }
    }
