<?php
	require_once 'Classes/Publication.php';
	require_once 'Classes/Chercheur.php';
        require_once 'Core/Vue.php';
        require_once 'Core/Controleur.php';
        require_once 'Classes/Exception/ChercheurAbsentException.php';

	class ControleurPublication extends Controleur{

            private $publications; 
            private $chercheur;
            
            public function __construct(){
                $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe'); 
                $this->publications = new Publication('1', $this->chercheur, 'titre', 'ref', 'annee', 'statut', 'type');
            }

            public function index(){
                try{
                    $donneesSpecifiques = array('publicationsAuteur' => $this->publications->getPublicationsRecentes(), 'titrePage' => 'Publications récemment ajoutées');
                    $this->genererVue($donneesSpecifiques);

                }
                catch(Exception $e){
                    $msgErreur = $e->getMessage();
                    $this->genererVue($msgErreur);
                }

            }

            public function publicationsChercheur(){
                try{
                    $idChercheur = $this->requete->getParametre('id');
                    $nomChercheur = $this->chercheur->getChercheur($idChercheur)->getNom();
                    $prenomChercheur = $this->chercheur->getChercheur($idChercheur)->getPrenom();
                    $titrePage = 'Publications de ' . $prenomChercheur . ' ' .$nomChercheur;
                    $donneesSpecifiques = array('publicationsAuteur' => $this->chercheur->getPublications($idChercheur), 'titrePage' => $titrePage);
                    $this->genererVue($donneesSpecifiques, "index");

                }
                catch(Exception $e){
                    $msgErreur = $e->getMessage();
                    $this->genererVue($msgErreur);
                }
            }
        }
