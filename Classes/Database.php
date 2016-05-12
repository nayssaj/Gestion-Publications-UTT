<?php
	class Database{
		
		//Implémentation suivant le patron singleton
		
		private static $instance = NULL;

		private function __construct(){}

		private function __clone(){}

		public static function getInstance(){
			if(!isset(self::$instance)){
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				try{
					self::$instance = new PDO("mysql:host=localhost;dbname=Gestion_Publication_UTT;charset=utf8", "root", "P16_LO07", $pdo_options);
				}
				catch(Exception $e){
					die('Erreur : ' . $e->getMessage());
				}
			return self::$instance;
			}
		}
	}
?>
