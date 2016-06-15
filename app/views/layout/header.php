<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mediastore</title>

    <base href="<?= $base_url.'/' ?>"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="assets/bower_components/semantic/dist/semantic.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/semantic/dist/semantic.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="ui large top hidden menu">
        <div class="ui container">
            <a href="<?= \app\helper\Link::url('HomeController@index')?>" class="item">Accueil</a> <!-- class active -->
            <a href="<?= \app\helper\Link::url('ArticlesController@index')?>" class="item">Articles</a>
            <a class="item">Panier</a>
            <div class="right menu">
                <?php if(app\helper\auth::isAuth()): ?>
                    <div class="item">
                        <p>Bonjour <?= $_SESSION['user']->prenom; ?></p>
                    </div>
                    <div class="item">
                        <a href="<?= \app\helper\Link::url('UserController@logout')?>" class="ui button">Déconnexion</a>
                    </div>
                    <?php if(app\helper\auth::isAdmin()): ?>
                        <div class="item">
                            <a href="<?= \app\helper\Link::url('UserController@login')?>" class="ui button">Backoffice</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="item">
                        <a href="<?= \app\helper\Link::url('UserController@login')?>" class="ui button">Se connecter</a>
                    </div>
                    <div class="item">
                        <a href="<?= \app\helper\Link::url('UserController@register')?>" class="ui primary button">S'inscrire</a>
                    </div>
                <?php endif; ?>
                <div class="item">
                    <div class="ui icon input">
                        <input name="search" type="text" id="search" placeholder="Recherche(s)...">
                        <button id="sendsearch"><i class="inverted circular search link icon"></i></button>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu">
      <a class="active item">Accueil</a>
      <a class="item">Panier</a>
      <a class="item">Se connecter</a>
      <a class="item">S'inscrire</a>
      <a class="item">Recherche</a>
    </div>

    <div class="ui center aligned container">
