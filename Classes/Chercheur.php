<?php

    require_once 'Core/Modele.php';
    require_once 'Publication.php';
    require_once 'Classes/Exception/ParametreAbsentException.php';
    require_once 'Classes/Exception/ChercheurAbsentException.php';

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

        public function getEquipe(){return ($this->equipe);}

	//Retourne les publication écrits par l'auteur sous forme d'objets	
	public function getPublications($idChercheur, $categorie = null){
            //On cherche toutes les publications écrites par l'auteur
            if($categorie == null){
                $reqPublications = 'SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id = ? ORDER BY Publication.annee DESC;';
                $reponsePublications = $this->executerRequete($reqPublications, array($idChercheur));
            }
            else{
                $reqPublications = 'SELECT Publication.* FROM Publication, redige WHERE Publication.id = redige.Publication_id AND redige.Auteur_id = ? AND Publication.categorie = ?  ORDER BY Publication.annee DESC;';
                $reponsePublications = $this->executerRequete($reqPublications, array($idChercheur, $categorie));
            }
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
                $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie']);
                unset($idAuteurs);
            }
            if (empty($publications))
                return null;
            else
                return $publications;
	}

        public function getNombreChercheurs(){
            $sql = 'SELECT count(*) as nbChercheurs FROM Auteur';
            $resultat = $this->executerRequete($sql);
            $ligne = $resultat->fetch();
            return $ligne['nbChercheurs'];
        }

        public function getChercheur($id){
            $sql = 'SELECT * FROM Auteur WHERE id = ?';
            $resultat = $this->executerRequete($sql, array($id));
            $chercheurID = $resultat->fetch();
            $chercheur = new Chercheur($chercheurID['id'], $chercheurID['nom'], $chercheurID['prenom'], $chercheurID['organisation'], $chercheurID['equipe']);
            return $chercheur;
        }

        public function getChercheurNom($nom, $prenom){
            $sql = 'SELECT id FROM Auteur WHERE nom = ? AND prenom = ?';
            $resultat = $this->executerRequete($sql, array($nom, $prenom));
            $chercheurID = $resultat->fetch();
            if(isset($chercheurID['id'])){
                return $chercheurID['id'];
            }
            else{
                throw new ChercheurAbsentException("Aucune publication trouvée pour ce chercheur");
            }
        }
    }
