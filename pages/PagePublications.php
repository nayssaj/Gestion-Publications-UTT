<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Publications</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="../bootstrap/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Accueil.php">Accueil</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                            if(isset($_POST['login']) && isset($_POST['mdp'])){
                                $_SESSION['login'] = $_POST['login'];
                                $_SESSION['mdp'] = $_POST['mdp'];
                            }
                            if (isset($_SESSION['login']) && isset($_SESSION['mdp'])){
                                //recherche SQL dans la base de la combin mdp=login
                                $recherche = 'bobi';
                                if($recherche == $_SESSION['mdp']){
                                    echo ('<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Mes Publications</a> <!-- faut faire ce lien -->
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="Accueil.php?deco=oui"><i class="fa fa-sign-out fa-fw"></i> Déconnexion </a>
                                    </li>');
                                }
                                else{
                                echo('<li><a data-toggle="modal" data-target="#myModal">Connexion</a></li>'); //myModal en bas du body pour éviter les problèmes d'affichage
                                }
                            }
                            if(!isset($_SESSION['login']) && !isset($_SESSION['mdp'])){
                                echo('<li><a data-toggle="modal" data-target="#myModal">Connexion</a></li>'); //myModal en bas du body pour éviter les problèmes d'affichage
                            }
                        ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="PagePublications.php"><i class="fa fa-dashboard fa-fw"></i>Publications</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--</li>@
                        <li>!-->
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        <?php
        function affichepublication($affiche){ //affcihe doit être un objet héritant de publication
            if(is_a($affiche,Publication)){
               $recupAuteurs = $affiche->getAuteurs();
                sort($recupAuteurs);
            echo('<div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>'); echo $affiche->getTitre();echo('
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Auteurs</th>
                                                    <th>Ref</th>
                                                    <th>Annee</th>');if(is_a($affiche,Conference)){
                                              echo('<th>Lieu</th>');}
                                              echo('<th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>');foreach($recupAuteurs as $auteur){echo $auteur->getNom();echo ('<br/>');}echo('</td>
                                                    <td>');echo $affiche->getRef();echo('</td>
                                                    <td>');echo $affiche->getAnnee();echo('</td>
                                                        ');if(is_a($affiche,Conference)){echo('<td>');echo $affiche->getLieu(); echo('</td>');}
                                                    echo('<td>');echo $affiche->getStatut();echo('</td>
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
                </div>'); 
            }//fin du if c'est une publication
            else{echo("erreur de l'affichage des publications<br/>");}
        }
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Publications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php 
                if(isset($_GET["auteur"])){
                    //récupérer publications liès à l'auteur de $_GET
                    foreach($_GET["auteur"] as $publi->$publications){
                        affichepublication($publications);
                    }
                }
                if(isset($_GET["sujet"])){
                }
                if(isset($_GET["auteur"]) && isset($_GET["sujet"])){
                }
                if (!(isset($_GET["auteur"]) || isset($_GET["sujet"]))){    
                require_once('../Classes/Chercheur.php');
                require_once('../Classes/Publication.php');
                require_once('../Classes/Conference.php');
                //require_once('../Classes/Article.php');
                $auteur1 = new Chercheur(1,'billy','billybob','UTT','GAMMA3');
                $auteur2 = new Chercheur(2,'bob','boby','UTT','theses');
                $auteur5 = new Chercheur(3,'GRE','GREBY','UTT','theses');
                $auteurs =array($auteur1,$auteur2);
                $auteurs4 =array($auteur2,$auteur1);
                $auteurs3 =array($auteur2,$auteur2);
/*
                affichepublication("ficelage",$auteurs, "10/34/90", "la théorie des ficelles", "google");
                affichepublication("birdo", $auteurs2, "10/26/12", "birdy", "twitter");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
                affichepublication("bible", $auteurs3, "10janvier 2309", "lecture", "facebook");
  */            
                $Mapubli1 = new Conference(4,array($auteur2,$auteur1),"lalalatitre","ref","2016","validé","Troyes","CI");
                affichepublication($Mapubli1);}
                $Mapubli2 = new Publication(3,array($auteur5,$auteur1,$auteur2), 'ceci est un très bon article', 'http://www.google.com', '2015', 'en cours', 'RF');
                affichepublication($Mapubli2);
                ?>
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!--Mymodal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">connexion</h4>
          </div>
            <form method="POST" action="PagePublications.php">
          <div class="modal-body">
              <h4>Login : </h4>
              <input type="text" name="login">
              <h4>Mot de Passe : </h4>
              <input type="password" name="mdp">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="Connexion">
          </div></form>
        </div>
      </div>
    </div>
    <!--/Mymodal-->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <!-- <script src="bootstrap/bower_components/raphael/raphael-min.js"></script>
    <script src="bootstrap/bower_components/morrisjs/morris.min.js"></script>
    <script src="bootstrap/js/morris-data.js"></script>  !-->
    <!-- Custom Theme JavaScript -->
    <script src="../bootstrap/dist/js/sb-admin-2.js"></script>
</body>

</html>