<?php
	require_once('Classes/Publication.php');
	require_once('Classes/Chercheur_UTT.php');
	require_once('vue/Vue.php');

	class ControlerAjoutPublication{

		private $chercheurUTT;

		public function __construct(){
		    $this->chercheurUTT = new Chercheur_UTT(1, 'michel', 'dupont', 'UTT', 'equipe', 'login', 'mdp');	
		}

		public function formulaireAjoutPublication(){
			//$publication = $this->publication->getPublication($isBillet);
			$vue = new Vue('AjoutPublication');
			$vue->generer(array('titrePage' => 'Ajouter une publication'));
                }

                public function ajouterPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut){
                    $this->chercheurUTT->ajoutPublication($auteurs, $titre_article, $reference_publication, $annee, $categorie, $lieu, $statut);
        }
    }
