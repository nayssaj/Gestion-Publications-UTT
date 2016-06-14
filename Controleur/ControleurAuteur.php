<?php
    
    require_once('Core/Controleur.php');
    require_once('Classes/Chercheur.php');

    class ControleurAuteur extends Controleur{

        private $chercheur;

        public function __construct(){
            $this->chercheur = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe');
        }

        public function index(){}

        public function coAuteur(){
            if(!($this->requete->existeParametre('a1') && $this->requete->existeParametre('a2'))){
                    throw new Exception("Paramètre de requete manquant");
            }
            $nomChercheur = $this->requete->getParametre('a2');
            $prenomChercheur = $this->requete->getParametre('a1');
            $titrePage = 'Co-Auteurs des publications de  ' . $prenomChercheur . ' '. $nomChercheur;
            $auteurs = $this->chercheur->coAuteurs($this->chercheur->getChercheurNom($nomChercheur, $prenomChercheur));
            $donneesSpecifiques = array('titrePage' => $titrePage, 'auteurs' => $auteurs);
            $this->genererVue($donneesSpecifiques, "index");
        }
    }
