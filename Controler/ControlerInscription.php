<?php
	require_once('Classes/Publication.php');
	require_once('Classes/Chercheur.php');
        require_once 'vue/Vue.php';
	//require_once('../Vue/vue.php');

	class ControlerInscription{

		private $publication;

		public function __construct(){
		}

		public function Inscription(){
			$vue = new Vue('Inscription');
			$vue->generer('Inscription');

                }
        }
