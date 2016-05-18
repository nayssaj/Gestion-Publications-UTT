<?php include("../Classes/Database.php");
session_start();
if(isset($_GET['deco'])){if($_GET['deco']=='oui'){session_destroy();}}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Laio">
    
    <title>Publications UTT</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/heroic-features.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publications <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Articles</a></li>
            <li><a href="#">Thèses</a></li>
          </ul>
        </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Auteurs <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Chercheurs UTT</a></li>
            <li><a href="#">Chercheurs extérieurs</a></li>
            <li><a href="#">Doctorants</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Départements</a></li>
          </ul>
        </li>
      </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){
                        $recherche_login = 'bobi';
                        $recherche_mdp = 'bobi';
                        //faire la recherche SQL
                        if(($recherche_login == $_SESSION['login']) && ($recherche_mdp =$_SESSION['mdp'])){   
                        /*
                    echo('    <li>
                        <a href="PagePublication.php">Mes Publications</a><!-- il faut modifier le lien -->
                        </li>
                        <li>
                        <a href="Accueil.php?deco=oui">Déconnexion</a>            <!--il faut recharger la page sinon les labels ne changent pas -->
                        </li>        
                            
                        ');*/} 
                    }
                    else{ echo('
                    <li>
                        <a href="Inscription.php">inscription</a>
                    </li>
                    <li><!-- on replace cela par un bouton de connexion 
                        <a href="#connect">Connexion</a> !-->
                        <a data-toggle="modal" data-target="#myModal">Connexion</a>
                    </li>
                    ');}?>        
                    <form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        
        <!-- /.container -->
    </nav>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">connexion</h4>
          </div>
            <form method="POST" action="PagePublications.php">
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
  <?php
    if(isset($_SESSION["login"]) && isset($_SESSION["mdp"])){
        //echo("trouvé");
    }
    else{
        if(isset($_POST["login"]) && isset($_POST["mdp"])){
          //  echo("retrouvé !");
            $resultatlogin="bobi";
            $resultatmdp="bobi";
            //requete SQL savoir si login et mdp sont bons
            if($_POST['mdp'] == $resultatmdp){
                $_SESSION["login"]=$resultatlogin;
                $_SESSION["mdp"]=$resultatmdp;
            //    echo("connexion en cours !");
            }
        }
        else{
            //echo("Vous n'étes pas connecté , infâme lepreuxchaun");
        }
    }
    
    ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Bienvenue !</h1>
            <p>Vous êtes actuellement sur le site des publications de l'UTT</p>
            <p><a class="btn btn-primary btn-large" href="PagePublications.php">Accéder aux articles!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2>A propos de nous</h2><br/>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-2 hero-feature">
                <div class="thumbnail">
                    <img src="../bootstrap/img/photoCV.jpg" alt="">
                    <div class="caption">
                        <h3>Léo Schneider</h3>
                        <p>Cofondateur/Développeur</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="" alt="">
                    <div class="caption">
                        <h3>Jean-gabriel Le Mercier</h3>
                        <p>Cofondateur/Développeur</p> 
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Léo Schneider, Jean-gabriel Le Mercier 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
