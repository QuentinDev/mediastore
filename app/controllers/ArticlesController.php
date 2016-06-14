<?php
namespace app\controllers;

use app\models\Article;
use app\models\User;

class ArticlesController extends BaseController
{
    public function index (){
        $articles = Article::all();
        echo $this->render('articles/index.php', compact('articles'));
        //print_r($articles);
    }

    public function recherches ($champs,$nom){
        $articles = [];
        if (in_array($champs, ['nom', 'description','type', 'prix', 'editeur']))
            $articles = Article::where($champs, 'like', '%'.$nom.'%')->get();

        echo $this->render('articles/recherches.php', compact('articles'));
    }

    public function detail ($id){
        $article = Article::findOrFail($id);
        echo $this->render('article/detail.php', compact('article'));
    }

}