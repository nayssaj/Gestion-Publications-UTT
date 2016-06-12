hi<?php 
    $this->titreEntete = 'Administrateur';
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
                        <li><a href='http://localhost/Gestion-Publications-UTT/index.php?controleur=admin'><i class="fa fa-book fa-fw"></i> Liste des comptes</a></li>
                        <li><a href="PagePublications.php"><i class="fa fa-question fa-fw"></i> Cohérence</a></li>
                        <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
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
    <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Administration</h1><!-- ELEMENT SPECIFIQUE -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <div id="contenu">
            Il y a <?= $nbPublications ?> publications enregistrées sur le site, écrites par <?= $nbChercheurs ?> chercheurs.</br> 
            <!--<a id="lienDeco" href="index.php?controleur=connexion&action=deconnecter">Se déconnecter</a>-->
            
            
            <?php foreach($comptes as $compte) :?>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Voici le compte <?= $compte->getId(); ?>
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
                        Informations du compte
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
                                            <th>Equipe</th>
                                            <th>login</th>
                                            <th>Mdp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $compte->getNom(); ?></td>
                                            <td><?= $compte->getPrenom(); ?></td>
                                            <td><?= $compte->getEquipe(); ?></td>
                                            <td><?= $compte->getLogin(); ?></td>
                                            <td><?= $compte->getMdp(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
    <!-- On passe sur la partie suivante avec toutes les publications de l'auteur 1-->
        <?php if(sizeof($compte->getPublications($compte->getId()))>0) :?>
        <?php foreach($compte->getPublications($compte->getId()) as $publication) :?>
        <div class="col-lg-12">
            <?php //foreach($compte->getPublications($compte->getId()) as $publication ) :?>
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Publication
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
                                            <th>Label</th>
                                            <th>Annee</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php foreach($publication->getAuteurs() as $auteur) :?>
                                                  <a href= "index.php?controleur=publication&action=publicationsChercheur&id=">
                                                    <?php echo $auteur->getNom() . ' ' . $auteur->getPrenom() . ' </br>' ?> 
                                                  </a>
                                                <?php endforeach; ?>
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
                        </div></div></div></div></div>
    <?php endforeach; ?>
    <?php endif; ?>                        
                            </div></div></div></div></div></div>
    <?php endforeach; ?>
        
        
        
        
        
        </div>
       <div class="row">
                <div class="col-lg-2">
                </div>
            </div> 
      </div>
      <!-- /#page-wrapper -->
