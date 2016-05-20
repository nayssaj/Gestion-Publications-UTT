<?php 
    $titreEntete = 'Publications';
    $titrePage = 'Publications';
 ?>   
    
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
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php' ?>