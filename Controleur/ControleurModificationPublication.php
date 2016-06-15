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
            $auteurPublication = $this->chercheur->getChercheur($this->requete->getSession()->getAttribut('idUtilisateur'));
            $publicationPage = $this->publication->getPublicationID($this->requete->getParametre('id'));
            if($publicationPage->verificationAuteur($auteurPublication)){
                $this->genererVue(array('titrePage' => 'Modifier une publication', 'titrePublication' => $publicationPage->getTitre(), 'publication' => $publicationPage, 'auteurs_publi' => $publicationPage->getAuteurs(), 'labelPublication' => $publicationPage->getRef()));
            }
            else{
                throw new Exception("Vous n'etes pas auteur de ce fichier");
            }
        }

        public function modificationPublication(){
            $publicationPage = $this->publication->getPublicationID($this->requete->getParametre('id'));
            if($this->requete->existeParametre('nom')){
                $noms = $this->requete->getParametre('nom');
                $prenoms = $this->requete->getParametre('prenom');
                $organisations = $this->requete->getParametre('organisation');
                $laboratoires = $this->requete->getParametre('departement');
                $suppression = $this->requete->getParametre('supprimer');
                for($i = 0; $i < count($noms); $i++){
                    $nouveauChercheur = new Chercheur(null, $noms[$i], $prenoms[$i], $organisations[$i], $laboratoires[$i]); 
                    if($this->chercheur->verificationAuteurBase($nouveauChercheur)){
                        $idChercheur = $this->chercheur->verificationAuteurBase($nouveauChercheur);
                        $nouveauChercheur = $this->chercheur->getChercheur($idChercheur);
                    }
                    if(!strcmp('true',$suppression[$i])){
                        $this->chercheur->retirerAuteur($publicationPage, $nouveauChercheur);
                    }
                    else{
                        $this->chercheur->ajouterChercheur($nouveauChercheur);
                        $this->chercheur->ajouterAuteurPublication($publicationPage, $nouveauChercheur);
                        $this->chercheur->setPlaceAuteur($publicationPage, $nouveauChercheur, $i + 1); 
                    }
                }
            }
            $nouveauTitre = $this->requete->getParametre('titre');
            $this->chercheur->modifierTitrePublication($publicationPage, $nouveauTitre);
            $nouveauLabel = $this->requete->getParametre('reference');
            $this->chercheur->modifierLabelPublication($publicationPage, $nouveauLabel);
            $nouveauStatut = $this->requete->getParametre('statut');
            $this->chercheur->modifierStatutPublication($publicationPage, $nouveauStatut);
            $this->rediriger('profil', null, $this->requete->getSession()->getAttribut('idUtilisateur')); 
        }
    }


