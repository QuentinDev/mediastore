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

}