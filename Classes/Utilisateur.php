<?php
    
    require_once 'Core/Modele.php';

    class Utilisateur extends Modele{

        //Verifie qu'un utilisateur existe dans la BDD
        public function connecter($login, $mdp){
            $sql = "SELECT utilisateur_id FROM Comptes WHERE login=? and mdp = ?";
            $utilisateur = $this->executerRequete($sql, array($login, $mdp));
            return ($utilisateur->rowCount() == 1);
        }

        //Renvoi un utilisateur existant dans la BD
        public function getUtilisateur($login, $mdp){
            $sql = "SELECT utilisateur_id, login, mdp, droit_utilisateur FROM Comptes WHERE login = ? AND mdp = ?";
            $utilisateur = $this->executerRequete($sql, array($login, $mdp));
            if($utilisateur->rowCount() == 1)
                return $utilisateur->fetch();
            else
                throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
        }
    }
