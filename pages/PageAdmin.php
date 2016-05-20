<?php 
    $titreEntete = 'Administrateur';
    $titrePage = "Page administrateur";
 ?> 
 
<?php ob_start(); ?>
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
<?php $barreGauche = ob_get_clean(); ?>

<?php require 'gabarit.php' ?>