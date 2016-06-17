<?php
namespace app\controllers;

use app\models\Article;
use Carbon\Carbon;

class ArticlesController extends BaseController
{

    //Page d'accueil des articles ==> affiche tous les articles

    public function index (){
        $articles = Article::all();
        echo $this->render('articles/index.php', compact('articles'));
    }


    //Recherche des articles sur un des critères ci-dessous. Soit nom, ou description, ou ...
    public function recherches ($nom){
        $nom = stripcslashes($nom);

        $articles = Article::with('Type')->where('nom', 'like', '%'.$nom.'%')
            ->orWhere('description', 'like', '%'.$nom.'%')
            ->orWhere('prix', '=', $nom)
            ->orWhere('editeur', 'like', '%'.$nom.'%')
            ->orWhereHas('Type', function($q) use ($nom) {
                $q->where('name', 'like', '%'.$nom.'%');
            })
            ->get();

        echo $this->render('articles/recherches.php', compact('articles', 'nom'));
    }

    //Recherche des nouveaux articles sr les critères:  1) n (paramètrable) derniers articles OU 2) articles de -1 mois
    public function nouveautes (){
        $articles = Article::where('status', 'nouveauté')->where('created_at', '>=', Carbon::now()->subMonth())->get();
        if (count($articles) == 0)
            $articles = Article::orderBy('created_at', 'asc')->take(20)->get();
        echo $this->render('articles/nouveautes.php', compact('articles'));
    }


    //Recherche d'un article sur sa clef $id
    public function detail ($id){
        $article = Article::findOrFail($id);
        echo $this->render('article/detail.php', compact('article'));
    }
}
