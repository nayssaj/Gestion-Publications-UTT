<?php
	require_once 'Classes/Publication.php';
	require_once 'Classes/Chercheur.php';
        require_once 'vue/Vue.php';
	//require_once('../Vue/vue.php');

	class ControlerPublication{

                private $publications; 
                
		public function __construct(){
                }


		public function publication($id){
                    $michel = new Chercheur('1', 'michel', 'dupont', 'UTT', 'equipe'); 
                    $this->publications = $michel->getPublication($id);
                    try{
                        $donneesSpecifiques = array('publicationsAuteur' => $this->publications, 'titrePage' => 'Publications');
                        $vue = new Vue('Publication');
                        $vue->generer($donneesSpecifiques);

		    }
                    catch(Exception $e){
                        $msgErreur = $e->getMessage();
                        $vue = new Vue('Erreur');
                        $vue6>generer($msgErreur);
	            }
            }
        }

