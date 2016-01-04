<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Who's Next</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!-- Affiche le header des pages -->
<header>
    <nav id="menu" class="navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Barre de menu -->
                <img class="navbar-brand" src="images/Logo_projet.gif" alt="Mountain View" style="width:50px;height:50px;"><
                <a class="navbar-brand" href="index.php">Who's Next</a>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Acceuil <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Chat Priver</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <!-- Formulaire de  Login -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
                <form class="navbar-form navbar-right" method="post" id="loginForm">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email"
                               value="" class="form-control "/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" placeholder="Password"
                               value=""
                               class="form-control "/>
                    </div>
                    <button id="login_btn" type="submit" name="submit_login" class="btn btn-primary">Connexion</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="errAuth" class="red" style="cursor:default" href="#"></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>