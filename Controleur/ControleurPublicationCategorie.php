<?php
	require_once 'Classes/Publication.php';
	require_once 'Classes/Chercheur.php';
        require_once 'Core/Vue.php';
        require_once 'Core/Controleur.php';
        require_once 'Classes/Exception/ChercheurAbsentException.php';

	class ControleurPublicationCategorie extends Controleur{

            private $publications; 
            private $chercheur;
            
            public function __construct(){
                $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe'); 
                $this->publications = new Publication('1', $this->chercheur, 'titre', 'ref', 'annee', 'statut', 'type');
            }

            /*
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
             */

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

            public function index(){
                try{
                    $categories = array(
                        'RI' => 'Article dans des Revues Internationales',
                        'CI' => 'Article dans des Conférences Internationales', 
                        'RF' => 'Article dans des revues Française',
                        'CF' => 'Article dans des conférences Française',
                        'OS' => 'Ouvrage Scientifique', 
                        'TD' => 'Thèse de doctorat', 
                        'BV' => 'Brevet', 
                        'AP' => 'Autre Production');
                    $prenomChercheur = $this->requete->getParametre('a1');
                    $nomChercheur = $this->requete->getParametre('a2');
                    $idChercheur = $this->chercheur->getChercheurNom($nomChercheur, $prenomChercheur);
                    $nomChercheur = $this->chercheur->getChercheur($idChercheur)->getNom();
                    $prenomChercheur = $this->chercheur->getChercheur($idChercheur)->getPrenom();
                    $titrePage = 'Publications de ' . $prenomChercheur . ' ' .$nomChercheur;
                    $publicationsCategories = array();
                    foreach($categories as $cle => $categorie){
                        $publicationsCategorie['titre'] = $categorie;
                        $publicationsCategorie['publications'] = $this->chercheur->getPublications($idChercheur, $cle); 
                        $publicationsCategories[] = $publicationsCategorie;
                    }
                    $donneesSpecifiques = array('publicationsCategories' => $publicationsCategories, 'titrePage' => $titrePage);
                    $this->genererVue($donneesSpecifiques);
                }
                catch(ChercheurAbsentException $e){
                    throw $e;
                }
                catch(Exception $e){
                    $msgErreur = $e->getMessage();
                    $this->genererVue($msgErreur);
                }
            }
        }

