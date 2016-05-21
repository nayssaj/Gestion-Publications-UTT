<<<<<<< HEAD
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
                        <?php echo $menuNavbar;?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
||||||| merged common ancestors
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
                            echo $menuNavbar;
                        ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
=======
<?php 
    $titreEntete = 'Publications';
    $titrePage = 'Publications';
 ?>   
  
<?php ob_start(); ?>
<!-- /.navbar-top-links -->
>>>>>>> ImplementationMVC
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
                        <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-question fa-fw"></i>Recherche Avancée</a></li>
                        <li><a href="PagePublications.php"><i class="fa fa-book fa-fw"></i>Publications</a></li>
                        <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="flot.html">Flot Charts</a></li>
                                <li><a href="morris.html">Morris.js Charts</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a></li>
                        <li><a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="panels-wells.html">Panels and Wells</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="notifications.html">Notifications</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="icons.html"> Icons</a></li>
                                <li><a href="grid.html">Grid</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="blank.html">Blank Page</a></li>
                                <li><a href="login.html">Login Page</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<<<<<<< HEAD
        <!-- Popup recherche-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">connexion</h4>
          </div>
            <form method="POST" action="PagePublications.php">
              
                <div class="modal-body"><ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Recherche Publications Chercheur</a></li>
                  <li><a data-toggle="tab" href="#menu1">Recherche Laboratoire à partir d'une année</a></li>
                  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                </ul>
                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                      <br/><h4>Recherche Publications Chercheur</h4><br/><br/>
                          <input type="text" name="recherche">
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <br/><h4>Recherche Laboratoire à partir d'une année</h4><br/><br/>
                    <input type="text" name="recherche" placeholder="Laboratoire">
                          <input type="text" name="Année" placeholder="Année">
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
                </div>
          </div>
                
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="rechercher">
          </div></form>
        </div>
      </div>
    </div>
        <!-- fin popup recherche-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Publications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<?php foreach($publicationsAuteur as $publication) :?>
			<div class="col-lg-12">
                    	<!-- /.panel -->
                        	<div class="panel panel-default">
                            	    <div class="panel-heading">
                                        <i class="fa fa-bar-chart-o fa-fw"></i>
					<?php $publication->getTitre();?>
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
                                                    	    <th>Annee</th>
                                              		    <th>Statut</th>
                                                	</tr>
                                                    </thead>
                                                    <tbody>
                                                	<tr>
                                                            <td> 
								<?php 
							            foreach($publication->getAuteurs() as $auteur){ 
							                echo $auteur->getNom() . ' ' . $auteur->getPrenom()  . '<br/>';
							            }
								?>
						            </td>
                                                    	    <td><?php echo $publication->getRef();?></td>
                                                    	    <td><?php echo $publication->getAnnee();?></td>
							    <td><?php echo $publication->getStatut();?></td>
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
               	        </div>
               	<?php endforeach; ?>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!--Mymodal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
||||||| merged common ancestors
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Publications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<?php foreach($publicationsAuteur as $publication) :?>
			<div class="col-lg-12">
                    	<!-- /.panel -->
                        	<div class="panel panel-default">
                            	    <div class="panel-heading">
                                        <i class="fa fa-bar-chart-o fa-fw"></i>
					<?php $publication->getTitre();?>
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
                                                    	    <th>Annee</th>
                                              		    <th>Statut</th>
                                                	</tr>
                                                    </thead>
                                                    <tbody>
                                                	<tr>
                                                            <td>
								<?php 
							            foreach($publication->getAuteurs() as $auteur){ 
							                echo $auteur->getNom() . ' ' . $auteur->getPrenom()  . '<br/>';
							            }
								?>
						            </td>
                                                    	    <td><?php echo $publication->getRef();?></td>
                                                    	    <td><?php echo $publication->getAnnee();?></td>
							    <td><?php echo $publication->getStatut();?></td>
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
               	        </div>
               	<?php endforeach; ?>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!--Mymodal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
=======
        <!-- Popup recherche-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
>>>>>>> ImplementationMVC
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">connexion</h4>
          </div>
            <form method="POST" action="PagePublications.php">
              
                <div class="modal-body"><ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Recherche Publications Chercheur</a></li>
                  <li><a data-toggle="tab" href="#menu1">Recherche Laboratoire à partir d'une année</a></li>
                  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                </ul>
                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                      <br/><h4>Recherche Publications Chercheur</h4><br/><br/>
                          <input type="text" name="recherche">
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <br/><h4>Recherche Laboratoire à partir d'une année</h4><br/><br/>
                    <input type="text" name="recherche" placeholder="Laboratoire">
                          <input type="text" name="Année" placeholder="Année">
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
                </div>
          </div>
                
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="rechercher">
          </div></form>
        </div>
      </div>
    </div>
<?php $barreGauche = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php foreach($publicationsAuteur as $publication) :?>
    <div class="col-lg-12">
        <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>
                    <?php $publication->getTitre();?>
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
                                            <th>Annee</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php 
                                                    foreach($publication->getAuteurs() as $auteur){ 
                                                        echo $auteur->getNom() . ' ' . $auteur->getPrenom()  . '<br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $publication->getRef();?></td>
                                            <td><?php echo $publication->getAnnee();?></td>
                                            <td><?php echo $publication->getStatut();?></td>
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
        </div>
    <?php endforeach; ?>
<?php $contenuCentral = ob_get_clean(); ?>

<?php require 'gabarit.php' ?>
