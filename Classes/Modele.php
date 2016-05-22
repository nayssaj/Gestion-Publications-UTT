<?php
    require_once 'Database.php';

    abstract class Modele{
        
        protected function executrRequete($sql, $params = null){
            $db = Database::getInstance();
            if($param == null){
                $resultat = $db->query($sql);
            }
            else{
                $resultat = $db->prepare($sql);
                $reusltat->execute($params);
            }
            return $resultat;
        }

    } 
