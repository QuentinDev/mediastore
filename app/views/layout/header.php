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
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/jQuery.serializeObject/dist/jquery.serializeObject.min.js"></script>
    <script src="assets/bower_components/semantic/dist/semantic.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="ui large top hidden menu">
        <div class="ui container">
            <a href="<?= \app\helper\Link::url('ArticlesController@nouveautes')?>" class="item">Accueil</a> <!-- class active -->
            <a href="<?= \app\helper\Link::url('ArticlesController@index')?>" class="item">Articles</a>
            <a href="<?= \app\helper\Link::url('PanierController@index')?>" class="item">Panier</a>
            <div class="right menu">
                <?php if(app\helper\auth::isAuth()): ?>
                    <div class="ui compact menu" style="margin: 10px;">
                        <div class="ui simple dropdown item" id="menu-panel">
                            <?= $_SESSION['user']->prenom; ?>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="<?= \app\helper\Link::url('UserController@profile')?>" class="ui button"><i class="icon user"></i> Mon profil</a>
                                <a class="item" href="<?= \app\helper\Link::url('CommandesController@index')?>" class="ui button"><i class="icon print"></i> Mes commandes</a>
                                <div class="divider"></div>
                                <?php if(app\helper\auth::isAdmin()): ?>
                                    <div class="header">Intranet</div>
                                    <a class="item" href="<?= \app\helper\Link::url('AdminController@listArticles')?>" class="ui button"><i class="icon book"></i> Articles</a>
                                    <a class="item" href="<?= \app\helper\Link::url('AdminController@listUsers')?>" class="ui button"><i class="icon users"></i> Users</a>
                                    <div class="divider"></div>
                                <?php endif; ?>
                                <a class="item" href="<?= \app\helper\Link::url('UserController@logout')?>" class="ui button"><i class="icon sign out"></i> Se déconnecter</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="item">
                        <a href="<?= \app\helper\Link::url('UserController@login')?>" class="ui button">Se connecter</a>
                    </div>
                    <div class="item">
                        <a href="<?= \app\helper\Link::url('UserController@register')?>" class="ui primary button">S'inscrire</a>
                    </div>
                <?php endif; ?>
                <div class="item">
                    <div class="ui remote search">
                        <div class="ui icon input">
                            <input class="prompt" name="search" id="search" type="text" placeholder="Recherche(s) article(s)..." autocomplete="off">
                            <i class="search icon"></i>
                        </div>
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
