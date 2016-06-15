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

	//Retourne les publication écrits par les auteur sous forme d'objets	
	public function getPublications($idChercheur = null, $categorie = null, $annee = null, $laboratoire = null){
            $requete = $this->creerRequetePublication($idChercheur, $categorie, $annee, $laboratoire);
            $requeteSQL= $requete[0];
            $parametreRequetePublication = $requete[1];
            $reponsePublications = $this->executerRequete($requeteSQL, $parametreRequetePublication);
            while($donneesPublication = $reponsePublications->fetch()){
                //On cherche tous les auteurs de la publication trouvée
                $reqAuteurs = 'SELECT Auteur.* FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id = ? ORDER BY redige.place';
                $reponseAuteurs = $this->executerRequete($reqAuteurs, array($donneesPublication['id'])); 
                //On garde en mémoire la liste de tous les auteurs de la publication trouvée
                //elle servira a créer l'objet publication associée à celle trouvée
                $idAuteurs = array();
                while($donneesAuteurs = $reponseAuteurs->fetch()){
                    $idAuteurs[] = new Chercheur($donneesAuteurs['id'], $donneesAuteurs['nom'], $donneesAuteurs['prenom'], $donneesAuteurs['organisation'], $donneesAuteurs['equipe']); 
                }
                //On viens créer un objet publication que l'on ajoute aux autres publication 
                //potentiellement déja trouvées 
                $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie']);
                unset($idAuteurs);
            }
            if (empty($publications)){
                return null;
            }
            else{
                return $publications;
            }
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

        public function coAuteurs($idChercheur){
            $sql = 'SELECT Auteur.*, COUNT( * ) FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Auteur_id != ? AND redige.Publication_id IN (SELECT redige.Publication_id FROM redige WHERE redige.Auteur_id = ?) GROUP BY Auteur.id ORDER BY COUNT(*) DESC';
            $resultat = $this->executerRequete($sql, array($idChercheur, $idChercheur));
            while($donneesAuteur = $resultat->fetch()){
                //$donneesAuteur = $auteur[
                $auteur = new Chercheur($donneesAuteur['id'], $donneesAuteur['nom'], $donneesAuteur['prenom'], $donneesAuteur['organisation'], $donneesAuteur['equipe']); 
                $nombreCoPublication = $donneesAuteur['COUNT( * )'];
                $auteurCompte = array($auteur, $nombreCoPublication);
                $auteurs[] = $auteurCompte;
            }
            if (empty($auteurs)){
                throw new Excpetion("Aucun co auteur trouvé pour ce chercheur");    
            }
            else{
                return $auteurs;
            }
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

        public function getPublisExterieures($nom, $prenom){
            $sql = "SELECT Publication.* FROM Publication, redige, Auteur WHERE Publication.id IN (SELECT redige.Publication_id FROM redige,Publication WHERE redige.Auteur_id IN (SELECT Auteur.id FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Auteur_id != ? AND Auteur.organisation != 'UTT' AND redige.Publication_id IN (SELECT redige.Publication_id FROM redige WHERE redige.Auteur_id = ?)GROUP BY Auteur.id)GROUP BY Publication.id)GROUP BY Publication.id";
            $resultat = $this->executerRequete($sql, array($nom, $prenom));
            while($donneesPublication = $resultat->fetch()){
                //On cherche tous les auteurs de la publication trouvée
                $reqAuteurs = 'SELECT Auteur.* FROM redige, Auteur WHERE Auteur.id = redige.Auteur_id AND redige.Publication_id = ? ORDER BY redige.place';
                $reponseAuteurs = $this->executerRequete($reqAuteurs, array($donneesPublication['id'])); 
                //On garde en mémoire la liste de tous les auteurs de la publication trouvée
                //elle servira a créer l'objet publication associée à celle trouvée
                $idAuteurs = array();
                while($donneesAuteurs = $reponseAuteurs->fetch()){
                    $idAuteurs[] = new Chercheur($donneesAuteurs['id'], $donneesAuteurs['nom'], $donneesAuteurs['prenom'], $donneesAuteurs['organisation'], $donneesAuteurs['equipe']); 
                }
                //On viens créer un objet publication que l'on ajoute aux autres publication 
                //potentiellement déja trouvées 
                $publications[] = new Publication($donneesPublication['id'], $idAuteurs, $donneesPublication['titre_article'], $donneesPublication['reference_publication'], $donneesPublication['annee'], $donneesPublication['statut'], $donneesPublication['categorie']);
                unset($idAuteurs);
            }
            if (empty($publications)){
                throw new Exception("Aucune publication trouvée");
            }
            else{
                return $publications;
            }
        }

        public function creerRequetePublication($idChercheur = null, $categorie = null, $annee = null, $laboratoire = null){
            if($idChercheur == null && $categorie == null && $annee == null){
                throw new Exception("Aucun parametre de requete spécifié");
            }
            $debutRequete = 'SELECT DISTINCT Publication.* ';
            $tablesRequete = 'FROM Publication';
            $conditionsRequete = ' WHERE ';
            $parametresRequete =array();

            if($idChercheur != null){
                $tablesRequete.= ', redige';
                $conditionsRequete .= 'Publication.id = redige.Publication_id AND redige.Auteur_id = ? AND ';
                $parametresRequete[] = $idChercheur;
            }
            if($categorie != null){
                $conditionsRequete .= 'Publication.categorie = ? AND ';
                $parametresRequete[] = $categorie;
            }
            if($annee != null){
                $conditionsRequete .= 'Publication.annee >= ? AND ';
                $parametresRequete[] = $annee;
            }
            if($laboratoire != null){
                $tablesRequete .= ', redige, Auteur';
                $conditionsRequete .= 'Publication.id = redige.Publication_id AND redige.Auteur_id = Auteur.id AND Auteur.equipe = ? AND ';
                $parametresRequete[] = $laboratoire;
            }
            $requeteSQL = $debutRequete . $tablesRequete . $conditionsRequete;
            $requeteSQL = substr($requeteSQL, 0, -4);
            $finRequete ='ORDER BY Publication.annee DESC';
            $requeteSQL .= $finRequete;
            $requete = array($requeteSQL, $parametresRequete);
            return $requete;
        }
    }
