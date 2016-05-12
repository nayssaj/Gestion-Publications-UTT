<?php
	try{
		$bdd = new PDO("mysql:host=dev-isi.utt.fr;dbname=le_mercj;charset=utf8", "le_mercj", "ZDmh23Jd");
	}
	catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
?>
