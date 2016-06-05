<?php 
    $this->titreEntete = 'Publications';
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
            <form method="POST" action="PagePublications.php">
              
                <div class="modal-body"><ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Recherche Publications Chercheur</a></li>
                  <li><a data-toggle="tab" href="#menu1">Recherche Laboratoire à partir d'une année</a></li>
                  <li><a data-toggle="tab" href="#menu2">Collaborations extérieures d'un chercheur UTT</a></li>
                  <li><a data-toggle="tab" href="#menu3">Liste des coauteurs</a></li>
                </ul>
                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                      <br/><h4>Publications Chercheur</h4><br/><br/>
                          <input type="text" name="r-prenom" placeholder="Prenom">
                        <input type="text" name="r-nom" placeholder="Nom">
                          <input type="hidden" name="type" value="1">
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <br/><h4>Laboratoire à partir d'une année</h4><br/><br/>
                    <input type="text" name="recherche" placeholder="Laboratoire">
                          <input type="text" name="Année" placeholder="Année">
                          <input type="hidden" name="type" value="2">
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <br/><h4>Collaborations extérieures</h4><br/><br/>
                          <input type="text" name="r-prenom" placeholder="Prenom">
                        <input type="text" name="r-nom" placeholder="Nom">
                          <input type="hidden" name="type" value="3">
                  </div>
                    <div id="menu3" class="tab-pane fade">
                    <br/><h4>Liste des coauteurs</h4><br/><br/>
                        <input type="text" name="r-prenom" placeholder="Prenom">
                        <input type="text" name="r-nom" placeholder="Nom">
                          <input type="hidden" name="type" value="4">
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
           <h1 class="page-header"><?= $titrePage ?></h1><!-- ELEMENT SPECIFIQUE -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <div id="contenu">
        <?php foreach($publicationsAuteur as $publication) :?>
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

      </div>
    </div>
    <!-- /#page-wrapper -->
  </div>

