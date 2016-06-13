<?php 
    $this->titreEntete = 'PublicationSpecifique';
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

    <!-- Popup recherche-->
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
           <h1 class="page-header"><?= $titrePage ?></h1><!-- ELEMENT SPECIFIQUE -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <div id="contenu">
            <div class="col-lg-12">
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                    Auteurs de "<?= $publication->getTitre() ?>"
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
                                            <th>Equipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach($Auteur as $auteur) :?>
                                        <tr>
                                            <td><?php echo $auteur->getNom()?></td>
                                            <td><?php echo $auteur->getPrenom()?></td>
                                            <td><?php echo $auteur->getOrganisation();?></td>
                                            <td><?php echo $auteur->getEquipe();?></td>
                                        </tr>
                                            <?php endforeach; ?>
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
          
          <div class="col-lg-12">
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>
                    Autres informations de "<?= $publication->getTitre() ?>"
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Référence</th>
                                            <th>Année</th>
                                            <th>Catégorie</th>
                                            <th>Statut</th>
                                            <?php if($publication->getType() === 'CI' ||$publication->getType() === 'CF'){echo ("<th>Lieu</th>");}?>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $publication->getTitre()?></td>
                                            <td><?php echo $publication->getRef()?></td>
                                            <td><?php echo $publication->getAnnee();?></td>
                                            <td><?php echo $publication->getType();?></td>
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
          
          
          

      </div>
        <div class="row">
                <div class="col-lg-2">
                </div>
            </div>
    </div>
    <!-- /#page-wrapper -->

