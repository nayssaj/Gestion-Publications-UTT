<?php
    
    class Configuration{

        private static $parametres;

        //Renvoi la valeur d'un parametres de configuration
        public static function get($nom, $valeurDefaut = null){
            if(isset(self::getParametres()['nom'])){
                $valeur = self::getParametres()['nom'];
            }
            else{
                $valeur = $valeurDefaut;
            }
            return $valeur;
        }

        //Renvoi le tableau des parametres en le chargeant au besoin
        private static function getParametres(){
            if(self::$parametres == null){
                $cheminFichier = 'Config/prod.ini';
                if(!file_exists($cheminFichier)){
                    $cheminFichier = 'Config/dev.ini';
                }
                if(!file_exists($cheminFichier)){
                    throw new Exception('Aucun fichier de configuration trouvé');
                }
                else{
                    self::$parametres = parse_ini_file($cheminFichier);
                }
            }
            return self::$parametres;
        }
    }
                


