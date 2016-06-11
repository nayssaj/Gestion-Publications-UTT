<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?= $racineWeb ?>">

    <title><?= $titreEntete ?></title> <!-- ELEMENT SPECIFIQUE -->

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="bootstrap/css/heroic-features.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <?= $stylesCss ?>
</head>
<body>
    <div id="wrapper">
    <div id="container">
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand topnav" href="#">Publications</a> !-->    
        <ul class="nav navbar-nav navbar-left">
          <li><a class="navbar-brand" href="index.php">Accueil</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publications <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?controleur=publication">Parcourir les publications</a></li>
              <?php if (isset($_SESSION['idUtilisateur'])): ?>
                <li><a href="index.php?controleur=ajoutPublication">Ajouter un article</a></li>
                <li><a href="index.php?controleur=modificationPublication">Modifier un article</a></li>
                <li><a href="index.php?controleur=admin">Administration</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if (!isset($_SESSION['idUtilisateur'])): ?>
            <li><a href="index.php?controleur=inscription">Inscription</a></li>
            <li><a data-toggle="modal" data-target="#modalConnexion">Connexion</a></li>
          <?php else: ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  
                <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?controleur=profil&id=<?=$_SESSION['idUtilisateur']?>"><i class="fa fa-user fa-fw"></i> Mon Profil</a></li>
                <li class="divider"></li>
                <li><a href="index.php?controleur=connexion&action=deconnecter"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </div>
     <!--/.navbar-collapse -->
    </div>  
  <!-- /.container -->
  </nav>
  <div class="modal fade" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Connexion</h4>
          </div>
            <form method="POST" action="index.php?controleur=connexion&action=connecter">
          <div class="modal-body">
              <h4>Login : </h4>
              <input type="text" name="login">
              <h4>Mot de Passe : </h4>
              <input type="password" name="mdp">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="Connexion">
          </div></form>
        </div>
      </div>
    </div> 
    </div>
<?= $contenu ?>
  <!-- jQuery -->
  <script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Metis Menu Plugin JavaScript -->
  <script src="bootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <!-- Morris Charts JavaScript -->
  <!-- <script src="bootstrap/bower_components/raphael/raphael-min.js"></script>
  <script src="bootstrap/bower_components/morrisjs/morris.min.js"></script>
  <script src="bootstrap/js/morris-data.js"></script>  !-->
  <!-- Custom Theme JavaScript -->
  <script src="bootstrap/dist/js/sb-admin-2.js"></script>
  <?= $script ?>
    </div>
</body>

</html>
