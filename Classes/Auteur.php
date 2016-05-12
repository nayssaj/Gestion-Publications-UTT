<?php
    class Auteur {
    
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
		require_once 'Database.php';
		$db = Database::getInstance();
		$articles = $db->query('SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id =\'' . $this->getId() . '\''); 
		while($donnees = $articles->fetch()){
			print_r($donnees);
		}
		$articles->closeCursor();	
	}		
    }
?>
