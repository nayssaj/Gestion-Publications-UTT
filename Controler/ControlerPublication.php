<?php
	require_once('../Classes/Publication.php');
	require_once('../Classes/Chercheur.php');
	//require_once('../Vue/vue.php');

	class ControlerPublication{

		private $publication;

		public function __construct(){
			$this->publication = new Publication();
		}

		public function publication(){
		//	$publication = $this->publication->getPublication($isBillet);
		//	$vue = new Vue('Publication');
		//	$vue->generer($publication);
                    try{
		        $bill = new Chercheur(1, 'Habile', 'Bill', 'UTT', 'GAMMA3');
                        $publicationsAuteur = $bill->getPublication();

			if(isset($_POST['login']) && isset($_POST['mdp'])){
        		    $_SESSION['login'] = $_POST['login'];
			    $_SESSION['mdp'] = $_POST['mdp'];
			}
			
		        if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){
                       	    //recherche SQL dans la base de la combin mdp=login
                            $recherche = 'bobi';
                            if($recherche == $_SESSION['mdp']){
                                $menuNavbar = '<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                   		</li>
                                    		<li><a href="#"><i class="fa fa-gear fa-fw"></i> Mes Publications</a> <!-- faut faire ce lien -->
                                    		</li>
                                    		<li class="divider"></li>
                                    		<li><a href="Accueil.php?deco=oui"><i class="fa fa-sign-out fa-fw"></i> Déconnexion </a>
                                    		</li>';
                            }
                            else{
                                $menuNavbar = '<li><a data-toggle="modal" data-target="#myModal">Connexion</a></li>'; //myModal en bas du body pour éviter les problèmes d'affichage
                            }
                        }
                        if(!isset($_SESSION['login']) && !isset($_SESSION['mdp'])){
                            $menuNavbar = '<li><a data-toggle="modal" data-target="#myModal">Connexion</a></li>'; //myModal en bas du body pour éviter les problèmes d'affichage
                        }
			include('../pages/PagePublications.php');
		    }
                    catch(Exception $e){
                        $msgErreur = $e->getMessage();
                        require '../pages/vueErreur.php';
	            }
            }
        }

