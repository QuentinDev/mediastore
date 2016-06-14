<?php
namespace app\controllers;

use app\models\Article;
use app\models\User;
use Carbon\Carbon;

class ArticlesController extends BaseController
{
    public function index (){
        $articles = Article::all();
        echo $this->render('articles/index.php', compact('articles'));
        //print_r($articles);
    }

    public function recherches ($nom){

        $articles = Article::where('nom', 'like', '%'.$nom.'%')
            ->orWhere('description', 'like', '%'.$nom.'%')
            ->orWhere('type', 'like', '%'.$nom.'%')
            ->orWhere('prix', 'like', '%'.$nom.'%')
            ->orWhere('editeur', 'like', '%'.$nom.'%')
            ->get();

        echo $this->render('articles/recherches.php', compact('articles'));
    }

    public function nouveautes ($max){
        $articles = Article::where('created_at', '>=', Carbon::now()->subMonth())->get();
        if (count($articles) == 0)
            $articles = Article::orderBy('created_at', 'asc')->take($max)->get();
        echo $this->render('articles/nouveautes.php', compact('articles'));
        //print_r($articles);
    }

    public function detail ($id){
        $article = Article::findOrFail($id);
        echo $this->render('article/detail.php', compact('article'));
    }
}