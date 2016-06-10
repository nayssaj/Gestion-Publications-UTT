<?php
	require_once('Core/Controleur.php');

	class ControleurInscription extends Controleur{

		public function index(){
                    try{
                        $donneesSpecifiques = array('titrePage' => 'Inscription');
                        $this->genererVue($donneesSpecifiques);
                    }
                    catch(Exception $e){
                        $msgErreur = $e->getMessage();
                        $this->genererVue($msgErreur);
                    }
                }
        }
