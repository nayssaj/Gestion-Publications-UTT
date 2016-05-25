<?php
    require_once 'Core/Database.php';

    abstract class Modele{
        
        protected function executerRequete($sql, $params = null){
            $db = Database::getInstance();
            if($params == null){
                $resultat = $db->query($sql);
            }
            else{
                $resultat = $db->prepare($sql);
                $resultat->execute($params);
            }
            return $resultat;
        }

    } 
