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

        public function getNom(){return ($this->nom);}
        public function setNom($nom){$this->nom = $nom;}

        public function getDepartement(){return ($this->departement);}
        public function setDepartement($departement){$this->departement = $departement;}

	//Retourne les articles écrits par l'auteur	
	public function getArticles(){
		require(database.php);
		$db = Database::getInstance();
		$articles = $db->query('SELECT Publication.* FROM Publication, Auteur, redige WHERE Article.id = redige.Publication_id AND redige.Auteur_id =\'' . $id . '\''); 
		while($donnees = $articles->fetech()){
			print_r($donnees);
		}
		$articles->closeCursor();		
	}		
    }
?>
