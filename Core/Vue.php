<?php
    class Vue{

        //Nom du fichier associé a la vue
        private $fichier;
        private $titreEntete;
        private $titrePage;
        private $script;

        public function __construct($action, $controleur =''){
            //Determinationi du nom du fichier vue a partir de l'action et du controleur
            $fichier = "Vue/";
            if ($controleur != ''){
                $fichier = $fichier . $controleur . "/";
            }
            $this->fichier = $fichier . $action . ".php";
        }

        //Genere et affiche la vue
        public function generer($donneesSpecifiques){
            //Generation de la partie spécifique de la vue
            $contenu = $this->genererFichier($this->fichier, $donneesSpecifiques);
            //Generation du gabarit commun utilisant la partie spécifique
            $vue = $this->genererFichier('Vue/gabarit.php',
                array(
                    'titreEntete' => $this->titreEntete,
                    'titrePage' => $this->titrePage,
                    'script' => $this->script,
                    'contenu' => $contenu
                )); 
            //Renvoi de la vue au navigateur
            echo $vue;
        }

        //Genere un fichier vue et renvoi le resultat produit
        private function genererFichier($fichier, $donnees){
            if(file_exists($fichier)){
                //Rend les éléments du tableau $donnees accessibles dans la vue
                extract($donnees);
                //Demarrage de la temporisation de sortie
                ob_start();
                //Inclut le fichier vue
                //Son resultat est placé dans le tampon de sortie
                require $fichier;
                //Arret de la temporisation et renvoi du tampon de sortie
                return ob_get_clean();
            }
            else{
                throw new Exception("Fichier '$fichier' introuvable");
            }
        }
    }

