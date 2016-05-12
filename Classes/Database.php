<?php
	class Db{
		
		//Implémentation suivant le patron singleton
		
		private static $instance = NULL;

		private function __construct(){}

		private function __clone(){}

		private static function getInstance(){
			if(!isset(self::$instance)){
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				try{
					self::$instance = new PDO("mysql:host=dev-isi.utt.fr;dbname=le_mercj;charset=utf8", "le_mercj", "ZDmh23Jd", $pdo_options);
				}
				catch(Exception $e){
					die('Erreur : ' . $e->getMessage());
				}
			return self::$instance;
			}
		}
	}
?>
