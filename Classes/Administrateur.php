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
                $nbpublie =array();$nbRI =array();$nbCI =array();$nbCF =array();
            for($i=0;$i<=sizeof($Chercheur)-1;$i++){
                $idChercheur = $Chercheur[$i]->getId();
                $getpubli = $Chercheur[$i]->getPublications($idChercheur);
                $nbpublie[$i] =0;$nbRI[$i] =0;$nbCI[$i] =0;$nbCF[$i] =0;
                if(sizeof($getpubli)>0){
                    foreach($getpubli as $a){
                        $annees[] = $a->getAnnee();
                        if($a->getStatut() === 'publie'){$nbpublie[$i]+=1;}
                        if($a->getType() === 'CI'){$nbCI[$i]+=1;}
                        if($a->getType() === 'CF'){$nbCF[$i]+=1;}
                        if($a->getType() === 'RI'){$nbRI[$i]+=1;}
                }
                $nbpublication[$i] = sizeof($getpubli);
                $anneemax[$i] = max($annees);
                $anneemin[$i] = min($annees);/*echo('<br/>');echo('<br/>');echo('<br/>');echo('<br/>');
                echo $nbpublication[$i];echo('<br/>');
                echo $anneemax[$i];echo('<br/>');
                echo $anneemin[$i];echo('<br/>');
                echo ("$nbpublie[$i]");*/
                $part1 = round((20*($nbpublication[$i]/($anneemax[$i] - $anneemin[$i] +1))), 1);
                $part2 = round((20*($nbpublie[$i]/$nbpublication[$i])), 1);
                $part3 = round((20*(($nbCI[$i] + $nbRI[$i])/$nbpublication[$i])), 1);
                $part4 = round((20*(($nbCI[$i]+$nbRI[$i])/$nbpublication[$i])), 1);
        //$pointsChercheur[$i] = ($nbpublication[$i]/($anneemax[$i] - $anneemin[$i] +1)) * ($nbpublie/$nbpublication[$i]) * (($nbCI + $nbRI)/$nbpublication[$i]) * (($nbCI+$nbRI)/$nbpublication[$i]);        
        $pointsChercheur[$i] = $part1 + $part2 + $part3 + $part4;
        $Resultat[$i] = array($Chercheur[$i]->getNom(),$Chercheur[$i]->getPrenom(),$Chercheur[$i]->getOrganisation(),$pointsChercheur[$i]);
            }}
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
