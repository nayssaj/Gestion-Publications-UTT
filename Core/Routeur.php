<?php   
    
    require_once 'Controler/ControlerAccueil.php';
    require_once 'Controler/ControlerPublication.php';
    require_once 'Controler/ControlerAjoutPublication.php';
    require_once 'Controler/ControlerModificationPublication.php';
    require_once 'Controler/ControlerInscription.php';
    require_once 'Classes/Chercheur.php';
    require_once 'vue/Vue.php';
//    require_once 'pages/vueErreur.php';

    class Routeur{

        private $ctrlAccueil;
        private $ctrlPublication;
        private $ctrlAjoutPublication;
        private $ctrlModificationPublication;
        private $ctrlInscription;

        public function __construct(){
            $this->ctrlAccueil = new ControleurAccueil();
            $this->ctrlPublication = new ControlerPublication();
            $this->ctrlAjoutPublication = new ControlerAjoutPublication();
            $this->ctrlModificationPublication = new ControlerModificationPublication();
            $this->ctrlInscritpion = new ControlerInscription();
        }

        public function routerRequete(){
                if(isset($_GET['action'])){
                    if($_GET['action'] == 'publication'){
                        $chercheur = new Chercheur('3', 'michel', 'dupont', 'UTT', 'MMRI');
                        $this->ctrlPublication->publication($chercheur->getId());
                    }
                    else if($_GET['action'] == 'formulaireAjoutPublication'){
                        $this->ctrlAjoutPublication->formulaireAjoutPublication();
                    }
                    else if($_GET['action'] == 'ajouterPublication'){
                        $nomChercheur = $_POST['nom'][0];
                        $prenomChercheur = $_POST['prenom'][0];
                        $idChercheur = 3;
                        $orgaChercheur = $_POST['organisation'][0];
                        $equipeChercheur = $_POST['departement'][0];
                        $chercheur = new Chercheur($idChercheur, $nomChercheur, $prenomChercheur, $orgaChercheur, $equipeChercheur);
                        $auteurs = array($chercheur);
                        $this->ctrlAjoutPublication->ajouterPublication($auteurs, $_POST['titre'], $_POST['reference'], $_POST['annee'], $_POST['categorie'], NULL, $_POST['statut'] );
                    }
                    else if($_GET['action'] == 'modifierPublication'){
                        $this->ctrlModificationPublication->modifierPublication();
                    }
                    else if($_GET['action'] == 'inscription'){
                        echo 'inscription';
                        $this->ctrlInscritpion->formulaireInscription();
                    }
                    else if($_GET['action'] == 'inscrire'){
                        echo 'inscrire';
                    }
                    else{
                        throw new Exception("Action non valide");
                    }
                }
                else{
                    $this->ctrlAccueil->Accueil();
                }
        }

        private function erreur($msgErreur){
            $vue = new Vue('Erreur');
            $vue->generer(array('msgErreur' => $msgErreur));
        }
    }

