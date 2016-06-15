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
        
        if(isset($_POST['search']))
            $nom=$_POST['search'];

        $articles = Article::with('Type')->where('nom', 'like', '%'.$nom.'%')
            ->orWhere('description', 'like', '%'.$nom.'%')
            ->orWhere('prix', '=', $nom)
            ->orWhere('editeur', 'like', '%'.$nom.'%')
            ->orWhereHas('Type', function($q) use ($nom) {
                $q->where('name', 'like', '%'.$nom.'%');
            })
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