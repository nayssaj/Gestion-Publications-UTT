<?php

        require_once 'Core/Modele.php';
	require_once 'Classes/Chercheur_UTT.php';

Class Administrateur extends Modele{
    
    //Renvoi les infos de tous les chercheurs possédants un compte sur le site
    public function getUtilisateurs(){
        $reqUtilisateurs = 'SELECT utilisateur_id,nom,prenom,equipe,login,mdp FROM Auteur, Comptes WHERE Auteur.id = Comptes.utilisateur_id';
        $reponseUtilisateurs = $this->executerRequete($reqUtilisateurs);
        while($donneesUtilisateurs = $reponseUtilisateurs->fetch()){
            //On crée un objet chercheur que l'on ajoute au tableau contenant ceux déja existant
            $Utilisateurs[] = new Chercheur_UTT($donneesUtilisateurs['utilisateur_id'], $donneesUtilisateurs['nom'], $donneesUtilisateurs['prenom'], $donneesUtilisateurs['equipe'],$donneesUtilisateurs['login'],$donneesUtilisateurs['mdp']);
        }
        return $Utilisateurs;
    }
    
    function detectionCoherenceDonnees(){
        $TitreVide =array();$AuteurUTT =array();$TypeVide =array();$LieuVide =array();
        $reqTitreVide = 'SELECT * FROM Publication WHERE Publication.titre_article IS null ';
            $reponseTitreVide = $this->executerRequete($reqTitreVide);
            while($donneesTitreVide = $reponseTitreVide->fetch()){
                $TitreVide[] = new Publication($donneesTitreVide['id'],null,$donneesTitreVide['titre_article'],$donneesTitreVide['reference_publication'],$donneesTitreVide['annee'],$donneesTitreVide['statut'],$donneesTitreVide['categorie'],$donneesTitreVide['lieu']); 
            }
            $reqAuteurUTT = "SELECT * FROM Auteur WHERE organisation = 'UTT' and (equipe != 'CREIDD' AND equipe != 'ERA' AND equipe != 'GAMMA3' AND equipe != 'LASMIS' AND equipe != 'LM2S' AND equipe != 'LNIO' AND equipe != 'LOSI' AND equipe != 'tech-CICO')";
            $reponseAuteurUTT = $this->executerRequete($reqAuteurUTT);
            while($donneesAuteurUTT = $reponseAuteurUTT->fetch()){
                $AuteurUTT[] =  new Chercheur($donneesAuteurUTT['id'],$donneesAuteurUTT['nom'],$donneesAuteurUTT['prenom'],$donneesAuteurUTT['organisation'],$donneesAuteurUTT['equipe']); 
            }
        $reqTypeVide = "SELECT * FROM Publication WHERE categorie != 'CI' AND categorie != 'CF' AND categorie != 'RI' AND categorie != 'RF' AND categorie != 'OS' AND categorie != 'TD' AND categorie != 'BV' AND categorie != 'AP'";
            $reponseTypeVide = $this->executerRequete($reqTypeVide);
            while($donneesTypeVide = $reponseTypeVide->fetch()){
                $TypeVide[] = new Publication($donneesTypeVide['id'],null,$donneesTypeVide['titre_article'],$donneesTypeVide['reference_publication'],$donneesTypeVide['annee'],$donneesTypeVide['statut'],$donneesTypeVide['categorie'],$donneesTypeVide['lieu']); 
            }
            $reqLieuVide = "SELECT * FROM Publication WHERE (categorie = 'CI' OR categorie = 'CF') AND lieu IS null ";
            $reponseLieuVide = $this->executerRequete($reqLieuVide);
            while($donneesLieuVide = $reponseLieuVide->fetch()){
                $LieuVide[] = new Publication($donneesLieuVide['id'],null,$donneesLieuVide['titre_article'],$donneesLieuVide['reference_publication'],$donneesLieuVide['annee'],$donneesLieuVide['statut'],$donneesLieuVide['categorie'],$donneesLieuVide['lieu']); 
            }
            $result= array($TitreVide,$AuteurUTT,$TypeVide,$LieuVide);
            return $result;
    }

    function statistiquesChercheurs(){
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
                $anneemin[$i] = min($annees);
                $part1 = round((20*($nbpublication[$i]/($anneemax[$i] - $anneemin[$i] +1))), 1);
                $part2 = round((20*($nbpublie[$i]/$nbpublication[$i])), 1);
                $part3 = round((20*(($nbCI[$i] + $nbRI[$i])/$nbpublication[$i])), 1);
                $part4 = round((20*(($nbCI[$i] + $nbCF[$i])/$nbpublication[$i])), 1);
                $pointsChercheur[$i] = $part1 + $part2 + $part3 + $part4;
                $Resultat[$i] = array($Chercheur[$i]->getNom(),$Chercheur[$i]->getPrenom(),$Chercheur[$i]->getOrganisation(),$pointsChercheur[$i]);
            }}
                return $Resultat;
    }

    //Ajoute un utilisateur dans la base de donnéee
    public function ajouterUtilisateur(Chercheur_UTT $nouvelUtilisateur){
        $sql = 'INSERT INTO Comptes VALUES(?, ?, ?, ?);';
        $this->executerRequete($sql, 
            array(
                $nouvelUtilisateur->getID(),
                $nouvelUtilisateur->getLogin(),
                $nouvelUtilisateur->getMdp(),
                0
            ));
    }
}
