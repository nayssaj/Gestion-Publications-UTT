<?php 
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
                         <li><a href='index.php?controleur=admin'><i class="fa fa-book fa-fw"></i> Liste des comptes</a></li>
                        <li><a href="index.php?controleur=coherence"><i class="fa fa-question fa-fw"></i> Cohérence</a></li>
                        <li><a href="index.php?controleur=statistiques"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php //var_dump($TitreVide);var_dump($AuteurUTT);var_dump($TypeVide);var_dump($LieuVide);?>
    <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Cohérence des données</h1><!-- ELEMENT SPECIFIQUE -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <div id="contenu">
            <!--<a id="lienDeco" href="index.php?controleur=connexion&action=deconnecter">Se déconnecter</a>-->
            
            <!--Erreur TitreVide -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Les publications avec des titres vides
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Référence</th>
                                            <th>Année</th>
                                            <th>Catégorie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(sizeof($TitreVide>0)) :?>
                                        <?php foreach($TitreVide as $TV) :?>
                                        <tr>
                                            <td><?= $TV->getId(); ?></td>
                                            <td><?= $TV->getRef(); ?></td>
                                            <td><?= $TV->getAnnee(); ?></td>
                                            <td><?= $TV->getCategorie(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
    <!-- On passe sur la partie suivante avec toutes les publications de l'auteur 1-->
        <div class="col-lg-12">
            <?php //foreach($compte->getPublications($compte->getId()) as $publication ) :?>
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Liste des auteurs UTT qui ne participent pas à une équipe de l'UTT
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Equipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(sizeof($AuteurUTT>0)) :?>
                                        <?php foreach($AuteurUTT as $AU) :?>
                                        <tr>
                                            <td><?= $AU->getId(); ?></td>
                                            <td><?= $AU->getNom(); ?></td>
                                            <td><?= $AU->getPrenom(); ?></td>
                                            <td><?= $AU->getEquipe(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
    <!-- Erreur suivante-->
    <div class="col-lg-12">
            <?php //foreach($compte->getPublications($compte->getId()) as $publication ) :?>
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        La liste des catégories qui n'ont pas une catégorie homologuée
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Référence</th>
                                            <th>Année</th>
                                            <th>Statut</th>
                                            <th>Categorie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(sizeof($TypeVide>0)) :?>
                                        <?php foreach($TypeVide as $TYV) :?>
                                        <tr>
                                            <td><?= $TYV->getId(); ?></td>
                                            <td><?= $TYV->getTitre(); ?></td>
                                            <td><?= $TYV->getRef(); ?></td>
                                            <td><?= $TYV->getAnnee(); ?></td>
                                            <td><?= $TYV->getStatut(); ?></td>
                                            <td><?= $TYV->getType(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
    
    
    <!-- Erreur suivante-->
    
    
    <div class="col-lg-12">
            <?php //foreach($compte->getPublications($compte->getId()) as $publication ) :?>
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                        Les Conférences qui ont un lieu vide
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Référence</th>
                                            <th>Année</th>
                                            <th>Statut</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(sizeof($LieuVide>0)) :?>
                                        <?php foreach($LieuVide as $LIV) :?>
                                        <tr>
                                            <td><?= $LIV->getId(); ?></td>
                                            <td><?= $LIV->getTitre(); ?></td>
                                            <td><?= $LIV->getRef(); ?></td>
                                            <td><?= $LIV->getAnnee(); ?></td>
                                            <td><?= $LIV->getStatut(); ?></td>
                                            <td><?= $LIV->getType(); ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    <?php endif;?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="morris-bar-chart"></div>
                        </div></div></div></div></div>
        
            </div>
        
        
       
       <div class="row">
                <div class="col-lg-2">
                </div>
            </div> 
      </div>
      <!-- /#page-wrapper -->
