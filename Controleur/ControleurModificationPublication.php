<?php

    require_once 'Controleur/ControleurSecurise.php';
    require_once 'Classes/Publication.php';
    require_once 'Classes/Chercheur_UTT.php';

    class ControleurModificationPublication extends ControleurSecurise{

        private $chercheur;
        private $publication;
        
        function __Construct(){    
            $this->chercheur = new Chercheur_UTT('1', 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');
            $this->publication = new Publication('1', array($this->chercheur), 'titre', 'ref', 'annee', 'statut', 'type');
        }
        
        public function index(){
            $publicationPage = $this->publication->getPublicationID($this->requete->getParametre('id'));
            $this->genererVue(array('titrePage' => 'Modifier une publication', 'publication' => $publicationPage, 'auteurs_publi' => $publicationPage->getAuteurs()));
        }

        public function modificationPublication(){
            $publicationPage = $this->publication->getPublicationID($this->requete->getParametre('id'));
            if($this->requete->existeParametre('nom')){
                $noms = $this->requete->getParametre('nom');
                $prenoms = $this->requete->getParametre('prenom');
                $organisations = $this->requete->getParametre('organisation');
                $laboratoires = $this->requete->getParametre('departement');
                for($i = 0; $i < count($noms); $i++){
                    $nouveauChercheur = new Chercheur(null, $noms[$i], $prenoms[$i], $organisations[$i], $laboratoires[$i]); 
                    $this->chercheur->ajouterChercheur($nouveauChercheur);
                    $this->chercheur->ajouterAuteurPublication($publicationPage, $nouveauChercheur);
                    $this->chercheur->setPlaceAuteur($publicationPage, $nouveauChercheur, $i + 1); 
                }
            }
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            /*
            $nouveauTitre = $this->requete->getParametre('titre');
            $this->chercheur->modifierTitrePublication($publicationPage, $nouveauTitre);
            $nouveauStatut = $this->requete->getParametre('reference');
            $this->chercheur->modifierLabelPublication($publicationPage, $nouveauStatut);
            $this->rediriger('profil', null, $this->requete->getSession()->getAttribut('idUtilisateur')); 
            */
        }
    }


