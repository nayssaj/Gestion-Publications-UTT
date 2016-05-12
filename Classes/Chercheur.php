<?php

	require_once 'Database.php';
	require_once 'Publication.php';

    class Chercheur{
    

	private $id;
        private $nom;
	private $prenom;
        private $organisation;
	private $equipe;

        public function __construct ($id,$nom,$prenom,$organisation,$equipe){
		$this->id = $id;		
		$this->nom = $nom;
		$this->prenom= $prenom;
		$this->organisation = $organisation;
		$this->equipe = $equipe;
        }

        public function getId(){return ($this->id);}
	public function setId($id){$this->id= $id;}
	
	public function getNom(){return ($this->nom);}
        public function setNom($nom){$this->nom = $nom;}


	public function getPrenom(){return ($this->prenom);}
        public function setPrenom($prenom){$this->prenom= $prenom;}

        public function getOrganisation(){return ($this->organisation);}
        public function setOrganisation($organisation){$this->organisation= $organisation;}

	//Retourne les publication écrits par l'auteur sous forme d'objets	
	public function getArticles(){
		$db = Database::getInstance();
		//On cherche toutes les publications écrites par l'auteur
		$reponse = $db->query('SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id =\'' . $this->getId() . '\''); 
		while($donneesPublication = $reponse->fetch()){
			//On cherche tous les auteurs de la publication trouvée
			$reponseAuteurs = $db->query('SELECT Auteur.id FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id =\''. $donneesPublication['id'] . '\''); 
			//On garde en mémoire la liste de tous les auteurs de la publication trouvée
			//elle servira a créer l'objet publication associée à celle trouvée
			while($donneesAuteurs = $reponseAuteurs->fetch()){
				$idAuteurs[] = $donneesAuteurs['id'];
			}
			$reponseAuteurs->closeCursor();
			//On viens créer un objet publication que l'on ajoute aux autres publication 
			//potentiellement déja trouvées 
			$publications[] = new Publication($idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut']);
			unset($idAuteurs);
		}
		$reponse->closeCursor();	
		return $publications;
	}		
    }
?>
