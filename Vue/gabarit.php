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
    <?= $stylesCss ?>
</head>

<body>
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
              <li><a href="index.php?controleur=ajoutPublication">Ajouter un article</a></li>
              <li><a href="index.php?controleur=modificationPublication">Modifier un article</a></li>
              <li><a href="index.php?controleur=admin">Administration</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Auteurs <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Chercheurs UTT</a></li>
              <li><a href="#">Chercheurs extérieurs</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      </div>
      <!-- /.navbar-collapse -->
    </div>  
  <!-- /.container -->
  </nav>
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
</body>

</html>
