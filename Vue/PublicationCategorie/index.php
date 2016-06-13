<?php 
    $this->titreEntete = 'Publications';
    $this->script = "<script src='styles/jquery/monjqueryRecherche.js'></script>";
    $this->stylesCss = '
    <!-- MetisMenu CSS -->
    <link href="bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="bootstrap/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Alertes JS -->
    <link href="styles/css/Moncss.css" rel="stylesheet" type="text/css">';
?> 

 <nav>
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
            <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-question fa-fw"></i>Recherche Avancée</a></li>
            <li><a href="index.php?controleur=publication"><i class="fa fa-book fa-fw"></i>Publications</a></li>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Recherche avancée</h4>
          </div>
            <form method="POST" action="index.php?controleur=publication&action=publicationsChercheurNom">
                <div class="modal-body">
                <br/><h4>Voici les différents types de recherche</h4><br/><br/>
                            
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" class="R1 R" name="type" value="1">
                    </span>
                    <label type="text" class="form-control">Recherche Publications Chercheur</label>
                </div>
                 <br/>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" class="R2 R" name="type" value="2">
                    </span>
                    <label type="text" class="form-control">Recherche Laboratoire à partir d'une année</label>
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" class="R3 R" name="type" value="3">
                    </span>
                    <label type="text" class="form-control">Collaborations extérieures d'un chercheur UTT</label>
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" class="R4 R" name="type" value="4">
                    </span>
                    <label type="text" class="form-control">Liste des coauteurs</label>
                </div>                       
              <br/><br/><br/>
              <input type="text" name="a1" class="arg1" placeholder="Prenom">
              <input type="text" name="a2" class="arg2" placeholder="Nom">
          </div>
                
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="rechercher">
          </div>
        </form>
        </div>
      </div>
    </div>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
           <h1 class="page-header"><?= $titrePage ?></h1><!-- ELEMENT SPECIFIQUE -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <div id="contenu">
      <?php foreach($publicationsCategories as $publicationCategorie): ?>
        <?php if(isset($publicationCategorie['publications'])): ?>
        <h3><?= $publicationCategorie['titre'] ?></h3>
          <?php foreach($publicationCategorie['publications'] as $publication) :?>
              <div class="col-lg-12">
              <!-- /.panel -->
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <i class="fa fa-bar-chart-o fa-fw"></i>
                      <?= $publication->getTitre() ?>
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
                                                    <a href= "index.php?controleur=publication&action=publicationsChercheur&id=<?= $auteur->getId()?>">
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
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  <?php endforeach; ?>
<?php endif; ?>
<?php endforeach; ?>


      </div>
        <div class="row">
                <div class="col-lg-2">
                </div>
            </div>
    </div>
    <!-- /#page-wrapper -->
