<?php
	require_once 'Classes/Publication.php';
	require_once 'Classes/Chercheur.php';
        require_once 'Core/Vue.php';
        require_once 'Core/Controleur.php';

	class ControleurPublication extends Controleur{

                private $publications; 
                
		public function __construct(){
                }

		public function index(){
                    $michel = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe'); 
                    $this->publications = $michel->getPublication('1');
                    try{
                        $donneesSpecifiques = array('publicationsAuteur' => $this->publications, 'titrePage' => 'Publications');
                        $this->genererVue($donneesSpecifiques);

		    }
                    catch(Exception $e){
                        $msgErreur = $e->getMessage();
                        $this->genererVue($msgErreur);
	            }
            }
        }

