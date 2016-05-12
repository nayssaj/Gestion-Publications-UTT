<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajout d'une Publication</title>

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
        <nav class="navbar navbar-inverse navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header navbar-inverse">
                <button type="button" class="navbar-toggle navbar-inverse" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-inverse" href="AjoutPublication.php">Nouvelle Publication</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-inverse navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Profil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Paramètres</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="pages/login.html"><i class="fa fa-sign-out fa-fw"></i>Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Formulaire pour une nouvelle Publication</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
            
            //on écrit le formulaire d'inscription
        echo('<form method="POST" action="AjoutPublication.php">');
        
            echo('<div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <i class="fa fa-fw"></i>'); echo('Quelles sont les informations de la Publication ?  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>titre<br/></th>
                                                    <th>annee<br/></th>
                                                    <th>statut<br/></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>');echo('<input class="form-control" type="text" value="" name="titre">');echo('</td>
                                                    <td>');echo('<select class="form-control" name="equipe" value="">'
                                                            .'<option value ="2016">2016</option>'
                                                            .'<option value ="2017">2017</option>'
                                                            .'<option value ="2018">2018</option>'
                                                            .'<option value ="2019">2019</option>'
                                                            .'<option value ="2020">2020</option>'
                                                            .'<option value ="2021">2021</option>'
                                                            .'<option value ="2022">2022</option>'
                                                            .'<option value ="2023">2023</option>'
                                                            . '</select>');echo('</td>
                                                    <td>');echo('<div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                    <input type="radio" name="statut" value="soumis" autocomplete="off" checked> Soumis
                                                      </label>
                                                      <label class="btn btn-warning">
                                                        <input type="radio" name="statut" value="revision" autocomplete="off"> En révision
                                                      </label>
                                                      <label class="btn btn-success">
                                                        <input type="radio" name="statut" value="publie" autocomplete="off"> Publié
                                                      </label>
                                                  </div>');echo('</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>');
                                                  echo('<div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <i class="fa fa-fw"></i>'); echo('Informations supplémentaires  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Lien de la publication<br/></th>
                                                    <th>catégorie<br/></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>');echo('<input class="form-control" type="text" value="" name="reference">');echo('</td>
                                                    <td>');echo('<select class="form-control" name="categorie" value="">'
                                                            .'<option value ="RI">Article dans les revues internationales</option>'
                                                            .'<option value ="RF">Article dans les revues nationales</option>'
                                                            .'<option value ="CI">Article dans les conférences internationales</option>'
                                                            .'<option value ="CF">Article dans les conférences nationales</option>'
                                                            .'<option value ="OS">Ouvrage scientifique</option>'
                                                            .'<option value ="TD">Thèse de doctorat</option>'
                                                            .'<option value ="BV">Brevet</option>'
                                                            .'<option value ="AP">Autre production</option>'
                                                            . '</select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>');
            
        echo("</form>"); //fin du formulaire
                                                    
                  
            ?>
            <?php 
                if(isset($_POST[nom]) && isset($_POST[prenom]) && isset($_POST[equipe]) && isset($_POST[login]) && isset($_POST[mdp])){
                    if(strlen($_POST[mdp])>6 ){ //ajouter les vérif d'existance login,nom et prenom 
                    //créer les éléments dans la BDD
                   // foreach ($_POST as $ele){
                   //     echo $ele;
                   //     echo ("<br/>");
                   // }
                    }
                }
                else{
           //         echo('il y a une erreur cliquez ici <a href=inscription.php?nom='."$_POST[nom]".'&prenom='."$_POST[prenom]".'&equipe='."$_POST[equipe]".'&login='."$_POST[login]".'>albezbe</a>'); 
             //       echo('arg');
                //header("location : inscription.php?nom="."$_POST[nom]"."&prenom=$_POST[prenom]&equipe=$_POST[equipe]&login=$_POST[login]");
                }
            ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
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