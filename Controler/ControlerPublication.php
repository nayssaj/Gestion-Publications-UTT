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

				$bill = new Chercheur(1, 'Habile', 'Bill', 'UTT', 'GAMMA3');
				$auteursPub[] = $bill;
				$astrapi = new Publication(1, $auteursPub, 'astrapi', 'ref', '2016', 'en cours de validation');
				$publication = $this->affichePublication($astrapi);

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

		public function affichePublication(Publication $affiche){ 
			$publication ='';
            		if(is_a($affiche,Publication)){
			       	$recupAuteurs = $affiche->getAuteurs();
			    	$publication .= '<div class="col-lg-12">
				    <!-- /.panel -->
				    <div class="panel panel-default">
				        <div class="panel-heading">
					<i class="fa fa-bar-chart-o fa-fw"></i>'; 
				$publication .= '</div>
					<!-- /.panel-heading --><div class="panel-body">
				            <div class="row">
				                <div class="col-lg-12">
				                    <div class="table-responsive">
				                        <table class="table table-bordered table-hover table-striped">
				                            <thead>
				                                <tr>
				                                    <th>Auteurs</th>
				                                    <th>Ref</th>
								    <th>Annee</th>';
				if(is_a($affiche,Conference)){
					$publication .='<th>Lieu</th>';
				}
				$publication .= '<th>Statut</th></tr></thead><tbody><tr><td>';
				foreach($recupAuteurs as $auteur){
					$publication .= $auteur->getNom();
					$publication .= '<br/>';
				}
				$publication .= '</td><td>' . $affiche->getRef() . '</td><td>' . $affiche->getAnnee() . '</td>';
				if(is_a($affiche,Conference)){
					$publication .= '<td>';
					$publication .= $affiche->getLieu(); 
					$publication .= '</td>';
				}
			       	$publication .= '<td>';
				$publication .=  $affiche->getStatut();
				$publication .= '</td>
				                                </tr>
				                            </tbody>
				                        </table>
				                    </div>
				                </div>
				                <div class="col-lg-12">
				                    <div id="morris-bar-chart"></div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>'; 
		    }//fin du if c'est une publication
			else{
				$publication = "erreur de l'affichage des publications<br/>";
		}
			return $publication;
        }
}
	


