<?php
        
        require_once('Controleur/ControleurSecurise.php');
	require_once('Classes/Publication.php');
	require_once('Classes/Chercheur_UTT.php');

	class ControleurAjoutPublication extends ControleurSecurise{

		private $chercheurUTT;

		public function __construct(){
		    $this->chercheurUTT = new Chercheur_UTT(1, 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');	
		}

                //Affiche le formlaire d'ajout
		public function index(){
                    $utilisateur = $this->chercheurUTT->getChercheur($this->requete->getSession()->getAttribut('idUtilisateur'));
                    $this->genererVue(array('titrePage' => 'Ajouter une publication', 'nomDefaut' => $utilisateur->getNom(), 'prenomDefaut' => $utilisateur->getPrenom(), 'organisationDefaut' => $utilisateur->getOrganisation(), 'laboratoireDefaut' => $utilisateur->getEquipe()));
                }

                //Ajoute une publication dans la base correspondant aux données du formulaire 
                public function ajouterPublication(){

                    $nbAuteurs = count($this->requete->getParametre('nom'));
                    $auteurs = array();
                    for($i = 0; $i < $nbAuteurs; $i++){

                        $nom = $this->requete->getParametre('nom')[$i];
                        $prenom = $this->requete->getParametre('prenom')[$i];
                        $organisation= $this->requete->getParametre('organisation')[$i];
                        $equipe= $this->requete->getParametre('departement')[$i];
                        $auteurs[] = new Chercheur(null, $nom, $prenom, $organisation, $equipe);
                    }

                    $titre = $this->requete->getParametre('titre');
                    $reference = $this->requete->getParametre('reference');
                    $annee = $this->requete->getParametre('annee');
                    $categorie = $this->requete->getParametre('categorie');
                    $statut = $this->requete->getParametre('statut');
                    if($this->requete->existeParametre('lieu'))
                        $lieu = $this->requete->getParametre('lieu');
                    else
                        $lieu = null;

                    $this->chercheurUTT->ajoutPublication($auteurs, $titre, $reference, $annee, $categorie, $lieu, $statut);
                    $this->rediriger('publication');
        }
    }
