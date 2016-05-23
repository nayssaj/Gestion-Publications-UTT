<?php

	require_once 'Database.php';	
	//S'assurer qu'il est nécéssaire de faire ce require
	require_once 'Chercheur.php';

Class Administrateur {
    private $login;
    private $mdp;
    
    public function getUtilisateurs(){
        //On cherche toutes les publications écrites par l'auteur
            $reqUtilisateurs = 'SELECT * FROM Comptes WHERE statut=utilisateur';
            $reponseUtilisateurs = $this->executerRequete($reqUtilisateurs);
            while($donneesUtilisateurs = $reponseUtilisateurs->fetch()){
                $reqNom = 'SELECT nom,prenom FROM Auteur WHERE Auteur.id = Comptes.auteur_id';
                $reponseNom = $this->executerRequete($reqNom);
                while($donneesNom = $reponseNom->fetch()){
                    $Utilisateurs[] = new Chercheur_UTT($donneesUtilisateurs['auteur_id'], $donneesNom['nom'], $donneesNom['prenom'], $donneesUtilisateurs['equipe'],$donneesUtilisateurs['login'],$donneesUtilisateurs['mdp']); 
                }
            }
            return $Utilisateurs;
    }
    
    function detectionCoherenceDonnees(){
        
    }
    function statistiquesChercheurs(){
        $nomChercheur ='bobi';
        $pointChercheur =4;
        $points = array(nomChercheur,$pointChercheur);
        
    }
}