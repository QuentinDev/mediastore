<?php
namespace app\controllers;

use app\models\Article;

class HomeController extends BaseController
{
    public function index() {
        $articles = Article::findOrFail(1);

        //dd($articles->magasins[0]->pivot->quantity);
        //dd($articles->commandes);

        $title = 'text';
        echo $this->render('home/index.php', compact('title'));
    }
}