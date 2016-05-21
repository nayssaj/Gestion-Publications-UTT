<<<<<<< HEAD
<?php include("../Classes/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>

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

            <ul class="nav navbar-top-links navbar-right"></ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Formulaire d'inscription</h1>
||||||| merged common ancestors
<?php include("../Classes/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>

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
                    <h1 class="page-header">Formulaire d'inscription</h1>
=======
<?php 
    $titreEntete = 'Inscription';
    $titrePage = "Formulaire d'inscription";
    $barreGauche = '';
 ?>  

<?php ob_start(); ?>
    <form method="POST" action="Inscription.php">
        <div class="col-lg-12">
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <i class="fa fa-fw"></i>
                    Quelles sont vos informations personnelles ?  
>>>>>>> ImplementationMVC
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom<br/></th>
                                            <th>Prenom<br/></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="nom">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="prenom">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- maintenant les infos UTT -->
        <div class="col-lg-12">
            <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                        <i class="fa fa-fw"></i>
                        Quelle est votre équipe de recherche ?
                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Equipe de recherche<br/></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>      
                                                    <td>
                                                        <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-primary active">
                                                                <input type="radio" name="equipe" value="CREIDD" autocomplete="off" checked> CREIDD
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="ERA" autocomplete="off"> ERA
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="GAMMA3" autocomplete="off"> GAMMA3
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="LASMIS" autocomplete="off"> LASMIS
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="LM2S" autocomplete="off"> LM2S
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="LNIO" autocomplete="off"> LNIO
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="LOSI" autocomplete="off"> LOSI
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="equipe" value="tech-CICO" autocomplete="off"> tech-CICO
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Informations du Compte -->
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            <i class="fa fa-fw"></i>
                            Quelles sont vos informations de compte ? 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Login<br/></th>
                                                    <th>Mot de passe<br/></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="text" name="login">
                                                    </td>
                                                    <td>
                                                        <input class ="form-control" type="password" value="" name="mdp">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="organisation" value="UTT">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <div class="well well-sm">   
                                    <table class="table">
                                        <thead>
                                            <p>Avez vous fini ?</p>
                                        </thead>
                                        <body>   
                                            <tr>
                                                <th>
                                                    <div class="">
                                                        <input class="btn btn-primary btn-large Monreinit" type="reset" value="Réinitialiser">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="">
                                                        <button class="btn btn-primary btn-large Monvalider" type="submit" value="Valider" name="submit">Valider
                                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th>
                                                        
                                                </th>
                                            </tr>
                                                  <!--<ul class="pager">
                                                    <li class="previous disabled"><span aria-hidden="true">&larr;older</span></li>
                                                    <li class="next"><span aria-hidden="true"><input class="btn btn-primary btn-large" type="reset" value="Réinitialiser"></span></li>
                                                  </ul> !-->
<<<<<<< HEAD
                                            </body>
                                        </table>
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
    <script src="../styles/jquery/monjqueryInscription.js"></script>
</body>
||||||| merged common ancestors
                                            </body>
                                        </table>
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
    <script src="../monjqueryInscription.js"></script>
</body>
=======
                                            <script src="../bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
                                            <script src="../monjqueryInscription.js"></script>
                                        </body>
                                    </table>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>                                        
    </form>               
<?php $contenuCentral = ob_get_clean(); ?>
>>>>>>> ImplementationMVC

<?php require 'gabarit.php' ?>
