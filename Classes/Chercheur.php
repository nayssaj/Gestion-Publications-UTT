<?php

    require_once 'Modele.php';
    require_once 'Database.php';
    require_once 'Publication.php';

    class Chercheur extends Modele{
    

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
	public function getPublication(){
            //On cherche toutes les publications écrites par l'auteur
            $reqPublications = 'SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id = ?';
            $reponsePublications = $this->executerRequete($reqPublications, array($this->getId()));
            while($donneesPublication = $reponsePublications->fetch()){
                    //On cherche tous les auteurs de la publication trouvée
                $reqAuteurs = 'SELECT Auteur.* FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id = ?';
                $reponseAuteurs = $this->executerRequete($reqAuteurs, array($donneesPublication['id'])); 
                    //On garde en mémoire la liste de tous les auteurs de la publication trouvée
                    //elle servira a créer l'objet publication associée à celle trouvée
                while($donneesAuteurs = $reponseAuteurs->fetch()){
                    $idAuteurs[] = new Chercheur($donneesAuteurs['id'], $donneesAuteurs['nom'], $donneesAuteurs['prenom'], $donneesAuteurs['organisation'], $donneesAuteurs['equipe']); 
                }
                //On viens créer un objet publication que l'on ajoute aux autres publication 
                //potentiellement déja trouvées 
                $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut']);
                unset($idAuteurs);
            }
            return $publications;
	}
    }
