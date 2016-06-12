<?php

        require_once 'Core/Modele.php';
	require_once 'Classes/Chercheur_UTT.php';

Class Administrateur extends Modele{
    
    public function getUtilisateurs(){/*
        unset($Utilisateurs);
        $reqUtilisateurs = 'SELECT * FROM Comptes';
        $reponseUtilisateurs = $this->executerRequete($reqUtilisateurs);
        while($donneesUtilisateurs = $reponseUtilisateurs->fetch()){
            $reqNom = 'SELECT nom,prenom,equipe FROM Auteur,Comptes WHERE Auteur.id = Comptes.utilisateur_id';
            $reponseNom = $this->executerRequete($reqNom);
            while($donneesNom = $reponseNom->fetch()){
                $Utilisateurs[] = new Chercheur_UTT($donneesUtilisateurs['utilisateur_id'], $donneesNom['nom'], $donneesNom['prenom'], $donneesNom['equipe'],$donneesUtilisateurs['login'],$donneesUtilisateurs['mdp']); 
            }
        }
        return $Utilisateurs;
    */
        $reqUtilisateurs = 'SELECT utilisateur_id,nom,prenom,equipe,login,mdp FROM Auteur, Comptes WHERE Auteur.id = Comptes.utilisateur_id';
        $reponseUtilisateurs = $this->executerRequete($reqUtilisateurs);
        while($donneesUtilisateurs = $reponseUtilisateurs->fetch()){
            $Utilisateurs[] = new Chercheur_UTT($donneesUtilisateurs['utilisateur_id'], $donneesUtilisateurs['nom'], $donneesUtilisateurs['prenom'], $donneesUtilisateurs['equipe'],$donneesUtilisateurs['login'],$donneesUtilisateurs['mdp']);
        }
        return $Utilisateurs;
    }
    
    function detectionCoherenceDonnees(){
        
    }
    function statistiquesChercheurs(){
        //me faut :  //nbpublication-OK annéemax anneemin nbpublié nbCI  nbRI nb CF 
            $reqChercheur = 'SELECT * FROM Auteur ORDER BY id';
            $reponseChercheur = $this->executerRequete($reqChercheur);
            while($donneesChercheur = $reponseChercheur->fetch()){
                $Chercheur[] = new Chercheur($donneesChercheur['id'], $donneesChercheur['nom'], $donneesChercheur['prenom'],$donneesChercheur['organisation'] ,$donneesChercheur['equipe']); 
            }
            for($i=0;$i<=sizeof($Chercheur);$i++){
                $idChercheur = $Chercheur[$i]->getId();
                $getpubli = $Chercheur[$i]->getPublications($idChercheur);
                $nbpublié =array();$nbRI =array();$nbCI =array();$nbCF =array();
                $nbpublié[$i] =0;$nbRI[$i] =0;$nbCI[$i] =0;$nbCF[$i] =0;
                if(sizeof($getpubli)>0){
                    foreach($getpubli as $a){
                        $annees[] = $a->getAnnee();
                        if($a->getStatut() === 'publie'){$nbpublié[$i]+=1;}
                        if($a->getType() === 'CI'){$nbCI[$i]+=1;}
                        if($a->getType() === 'CF'){$nbCF[$i]+=1;}
                        if($a->getType() === 'RI'){$nbRI[$i]+=1;}
                }}
                $nbpublication[$i] = sizeof($getpubli);
                $anneemax[$i] = max($annees);
                $anneemin[$i] = min($annees);echo('<br/>');echo('<br/>');echo('<br/>');echo('<br/>');
                echo $nbpublication[$i];echo('<br/>');
                echo $anneemax[$i];echo('<br/>');
                echo $anneemin[$i];echo('<br/>');
                echo $nbpublié;echo('<br/>');echo('<br/>');echo('<br/>');echo('<br/>');
            $pointsChercheur[$i] = ($nbpublication[$i]/($anneemax[$i] - $anneemin[$i] +1)) * ($nbpublié/$nbpublication[$i]) * (($nbCI + $nbRI)/$nbpublication[$i]) * (($nbCI+$nbRI)/$nbpublication[$i]);        
        $Resultat[$i] = array($Chercheur[$i]->getNom(),$Chercheur[$i]->getPrenom(),$pointsChercheur[$i]);
        }
        return $Resultat;
        //print_r($Resultat);
    }

    public function ajouterUtilisateur(Chercheur_UTT $nouvelUtilisateur){
        $sql = 'INSERT INTO Comptes VALUES(?, ?, ?);';
        $this->executerRequete($sql, 
            array(
                $nouvelUtilisateur->getID(),
                $nouvelUtilisateur->getLogin(),
                $nouvelUtilisateur->getMdp(),
            ));
    }
}
