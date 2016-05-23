<?php

	require_once 'Database.php';	
	//S'assurer qu'il est nécéssaire de faire ce require
	require_once 'Chercheur.php';

Class Administrateur {
    private $login;
    private $mdp;
    
    public function getUtilisateurs(){
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
        //me faut :  //nbpublication-OK annéemax anneemin nbpublié nbCI  nbRI nb CF 
            $reqChercheur = 'SELECT * FROM Auteur ORDER BY id';
            $reponseChercheur = $this->executerRequete($reqChercheur);
            while($donneesChercheur = $reponseChercheur->fetch()){
                $Chercheur[] = new Chercheur($donneesChercheur['id'], $donneesChercheur['nom'], $$donneesChercheur['prenom'],$donneesChercheur['organisation'] ,$donneesChercheur['equipe']); 
            }
            for($i=0;$i<=sizeof($Chercheur);$i++){
                $getpubli =$Chercheur[$i]->getPublication();
                $nbpublié =0;$nbRI =0;$nbCI =0;$nbCF =0;
                foreach($getpubli as $a){
                    $annees[] = $a->getAnnee();
                    if($a->getStatut() == 'publie'){$nbpublié[i]+=1;}
                    if($a->getType() === 'CI'){$nbCI[i]+=1;}
                    if($a->getType() === 'CF'){$nbCF[i]+=1;}
                    if($a->getType() === 'RI'){$nbRI[i]+=1;}
                }
                $nbpublication[$i] = sizeof($getpubli);
                $anneemax[$i] = max($annees);
                $anneemin[$i] = min($annees);
            $pointsChercheur[$i] = $nbpublication[$i]/($anneemax[i] - $anneemin[i]) * ($nbpublié/$nbpublication) * (($nbCI + $nbRI)/$nbpublication) * (($nbCI+$nbRI)/$nbpublication);        
        $Résultat[i] = array($Chercheur[i]->getNom(),$Chercheur[i]->getPrenom(),$pointsChercheur[i]);
        }
        return $Résultat;
    }
}