<?php
        
        require_once('Core/Controleur.php');
	require_once('Classes/Publication.php');
	require_once('Classes/Chercheur_UTT.php');

	class ControleurAjoutpublication extends Controleur{

		private $chercheurUTT;

		public function __construct(){
		    $this->chercheurUTT = new Chercheur_UTT(1, 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');	
		}

                //Affiche le formlaire d'ajout
		public function index(){
			//$publication = $this->publication->getPublication($isBillet);
                        $this->genererVue(array('titrePage' => 'Ajouter une publication'));
                }

                //Ajoute une publication dans la base correspondant aux données du formulaire 
                public function ajouterPublication(){
                    $auteurs = array($this->chercheurUTT);
                    $titre_article = $this->requete->getParametre("titre");
                    $reference_publication = $this->requete->getParametre("reference");
                    $annee = $this->requete->getParametre("annee");
                    $categorie = $this->requete->getParametre("categorie");
                    $lieu = null;
                    $statut = $this->requete->getParametre("statut");
                    $this->chercheurUTT->ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut);
                    $this->index();
        }
    }
