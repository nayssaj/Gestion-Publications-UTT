<?php 
    $this->titreEntete = 'Statistiques';
    $this->stylesCss = '
    <!-- MetisMenu CSS -->
    <link href="bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="bootstrap/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Alertes JS -->
    <link href="styles/css/Moncss.css" rel="stylesheet" type="text/css">';
 ?> 

<!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href='index.php?controleur=admin'><i class="fa fa-book fa-fw"></i> Liste des comptes</a></li>
                        <li><a href="index.php?controleur=coherence"><i class="fa fa-question fa-fw"></i> Cohérence</a></li>
                        <li><a href="index.php?controleur=statistiques"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Popup recherche-->
        
    <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Statistiques</h1><!-- ELEMENT SPECIFIQUE -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <div id="contenu">
            <!--<a id="lienDeco" href="index.php?controleur=connexion&action=deconnecter">Se déconnecter</a>-->
            
            
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Voici les statistiques 
                    </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <!-- les infos de l'auteur-->
                                <div class="col-lg-12">
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Organisation</th>
                                            <th>score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php foreach($resultat as $res) :?>
                                        <tr>
                                            <td><?= $res[0] ?></td>
                                            <td><?= $res[1] ?></td>
                                            <td><?= $res[2] ?></td>
                                            <td><?= $res[3] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
                            </div></div></div></div></div></div>
        
        
        
        
        
        </div>
       <div class="row">
                <div class="col-lg-2">
                </div>
            </div> 
      </div>
      <!-- /#page-wrapper -->
