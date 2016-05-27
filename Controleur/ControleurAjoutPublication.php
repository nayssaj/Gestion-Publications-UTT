<?php
        
        require_once('Core/Controleur.php');
	require_once('Classes/Publication.php');
	require_once('Classes/Chercheur_UTT.php');

	class ControleurAjoutPublication extends Controleur{

		private $chercheurUTT;

		public function __construct(){
		    $this->chercheurUTT = new Chercheur_UTT(1, 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');	
		}

                //Affiche le formlaire d'ajout
		public function index(){
                        $this->genererVue(array('titrePage' => 'Ajouter une publication'));
                }

                //Ajoute une publication dans la base correspondant aux données du formulaire 
                public function ajouterPublication(){

                    $nbAuteurs = count($this->requete->getParametres('nom'));
                    $auteurs = array();
                    for($i = 0; $i < $nbAuteurs; $i++){

                        $nom = $this->requete->getParametres('nom')[$i];
                        $prenom = $this->requete->getParametres('prenom')[$i];
                        $organisation= $this->requete->getParametres('organisation')[$i];
                        $equipe= $this->requete->getParametres('departement')[$i];
                        $auteurs[] = new Chercheur(null, $nom, $prenom, $organisation, $equipe);
                    }

                    $titre = $this->requete->getParametres('titre');
                    $reference = $this->requete->getParametres('reference');
                    $annee = $this->requete->getParametres('annee');
                    $categorie = $this->requete->getParametres('categorie');
                    $statut = $this->requete->getParametres('statut');
                    if($this->requete->existeParametre('lieu'))
                        $lieu = $this->requete->getParametres('lieu');
                    else
                        $lieu = null;

                    $this->chercheurUTT->ajoutPublication($auteurs, $titre, $reference, $annee, $categorie, $lieu, $statut);
                    $this->executerAction('index');
        }
    }
