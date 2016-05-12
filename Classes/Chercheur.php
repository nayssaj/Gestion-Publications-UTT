<?php
    class Chercheur{
    
	require_once 'Database.php';
	require_once 'Publication.php';

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

	//Retourne les articles écrits par l'auteur	
	public function getArticles(){
		$db = Database::getInstance();
		$reponse = $db->query('SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id =\'' . $this->getId() . '\''); 
		while($donneesPublication = $reponse->fetch()){
			$idPublication = $donneesPublication['id'];
			$reponseAuteurs = $db->query('SELECT Auteur.id FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id =\''. $idPublication . '\''); 
			$donnesAuteurs = $reponseAuteurs->fetch;
			echo "id de l'auteur = " . $donnesAuteurs['id'];
//			$publication = new Publication($donnees[''], $donnees['titre_article'], $donnees['reference_publication'], $donnees['annee'], $donnees['statut'])
			print_r($donnees);
		}
		$articles->closeCursor();	
	}		
    }
?>
