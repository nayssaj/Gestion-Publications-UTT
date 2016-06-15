<?php
	require_once 'Classes/Publication.php';
	require_once 'Classes/Chercheur.php';
        require_once 'Core/Vue.php';
        require_once 'Core/Controleur.php';
        require_once 'Classes/Exception/ChercheurAbsentException.php';

	class ControleurPublicationCategorie extends Controleur{

            private $publications; 
            private $chercheur;
            private $categories = array(
                'RI' => 'Article dans des Revues Internationales',
                'CI' => 'Article dans des Conférences Internationales', 
                'RF' => 'Article dans des revues Française',
                'CF' => 'Article dans des conférences Française',
                'OS' => 'Ouvrage Scientifique', 
                'TD' => 'Thèse de doctorat', 
                'BV' => 'Brevet', 
                'AP' => 'Autre Production');
            
            public function __construct(){
                $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe'); 
                $this->publications = new Publication('1', $this->chercheur, 'titre', 'ref', 'annee', 'statut', 'type');
            }

            public function index(){
                try{
                    $titrePage = "Publications des chercheurs de l'UTT";
                    $publicationsCategories = array();
                    foreach($this->categories as $cle => $categorie){
                        $publicationsCategorie['titre'] = $categorie;
                        $publicationsCategorie['publications'] = $this->chercheur->getPublications(null, $cle, null); 
                        $publicationsCategories[] = $publicationsCategorie;
                    }
                    $donneesSpecifiques = array('publicationsCategories' => $publicationsCategories, 'titrePage' => $titrePage);
                    $this->genererVue($donneesSpecifiques);
                }
                catch(Exception $e){
                    throw $e;
                }
            }

            public function publicationsChercheurNom(){
                if(!($this->requete->existeParametre('a1') && $this->requete->existeParametre('a2'))){
                    throw new Exception("Paramètre de requete manquant");
                }
                try{
                    $prenomChercheur = $this->requete->getParametre('a1');
                    $nomChercheur = $this->requete->getParametre('a2');
                    $idChercheur = $this->chercheur->getChercheurNom($nomChercheur, $prenomChercheur);
                    $nomChercheur = $this->chercheur->getChercheur($idChercheur)->getNom();
                    $prenomChercheur = $this->chercheur->getChercheur($idChercheur)->getPrenom();
                    $titrePage = 'Publications de ' . $prenomChercheur . ' ' .$nomChercheur;
                    $publicationsCategories = array();
                    foreach($this->categories as $cle => $categorie){
                        $publicationsCategorie['titre'] = $categorie;
                        $publicationsCategorie['publications'] = $this->chercheur->getPublications($idChercheur, $cle); 
                        $publicationsCategories[] = $publicationsCategorie;
                    }
                    $donneesSpecifiques = array('publicationsCategories' => $publicationsCategories, 'titrePage' => $titrePage);
                    //$this->genererVue($donneesSpecifiques, "index");
                }
                catch(ChercheurAbsentException $e){
                    throw $e;
                }
                catch(Exception $e){
                    $msgErreur = $e->getMessage();
                    $this->genererVue($msgErreur);
                }
            }

            public function publicationsLaboratoire(){
                if(!($this->requete->existeParametre('a1') && $this->requete->existeParametre('a2'))){
                    throw new Exception("Paramètre de requete manquant");
                }
                try{
                    $laboratoire = $this->requete->getParametre('a1');
                    $annee = $this->requete->getParametre('a2');
                    $titrePage = "Publications de l'équipe " . $laboratoire . ' depuis ' . $annee;
                    $publicationsCategories = array();
                    foreach($this->categories as $cle => $categorie){
                        $publicationsCategorie['titre'] = $categorie;
                        $publicationsCategorie['publications'] = $this->chercheur->getPublications(null, $cle, $annee, $laboratoire);
                        $publicationsCategories[] = $publicationsCategorie;
                    }
                    $donneesSpecifiques = array('publicationsCategories' => $publicationsCategories, 'titrePage' => $titrePage);
                    $this->genererVue($donneesSpecifiques, "index");
                }
                catch(Exception $e){
                    throw $e;
                }
            }
        }

