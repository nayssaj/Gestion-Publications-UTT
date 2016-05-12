<?php
    class Auteur {
    
        private $nom;
        private $departement;

<<<<<<< HEAD
        function __construct ($nom,$departement){
            $this->nom = $nom;
            $this->departement = $departement;
=======
        public function __construct ($id,$nom,$prenom,$organisation,$equipe){
		$this->id = $id;		
		$this->nom = $nom;
		$this->prenom= $prenom;
		$this->organisation = $organisation;
		$this->equipe = $equipe;
>>>>>>> e02cb18974a74c6b25376878fcffeae25a7b811a
        }

        function getNom(){return ($this->nom);}
        function setNom($nom){$this->nom = $nom;}

        function getDepartement(){return ($this->departement);}
        function setDepartement($departement){$this->departement = $departement;}
 
    }
?>
