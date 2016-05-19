<?php
	require_once('../Classes/Publication.php');
	require_once('../Vue/vue.php');

	class ControlerPublication{

		private $publication;

		public function __construct(){
			$this->publication = new Publication();
		}

		public function publication($idBillet){
			$publication = $this->publication->getPublication($isBillet);
			$vue = new Vue('Publication');
			$vue->generer($publication);
		}
	}

