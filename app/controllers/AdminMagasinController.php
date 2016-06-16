<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 16/06/2016
 * Time: 13:31
 */

namespace app\controllers;

use app\helper\Auth;
use app\helper\Redirect;
use app\models\Article;
use app\models\Magasin;
use Pecee\Http\Request;

class AdminMagasinController extends BaseController
{
    public function index() {
        $magasins = Magasin::all();
        echo $this->render('admin/magasin/index.php', compact('magasins'));
    }

    public function add() {
        $nom = Request::getInstance()->getInput()->get('nom');
        $adresse = Request::getInstance()->getInput()->get('adresse');
        $magasin = new Magasin();
        if($nom && $adresse) {
            $magasin->nom = $nom;
            $magasin->adresse = $adresse;
 
            if ($magasin->save()) {
                Auth::setFlash("Magasin correctement ajouté", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        echo $this->render('admin/magasin/edit.php');
    }

    public function edit($id) {
        $nom = Request::getInstance()->getInput()->get('nom');
        $adresse = Request::getInstance()->getInput()->get('adresse');
        $article_id = Request::getInstance()->getInput()->get('article_id');
        $number = Request::getInstance()->getInput()->get('number');

        $magasin = Magasin::findOrFail($id);
        if($nom && $adresse) {
            $magasin->nom = $nom;
            $magasin->adresse = $adresse;
            if ($magasin->save()) {
                Auth::setFlash("Magasin correctement édité", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }

        if ($article_id && $number) {
            $article = Article::findOrFail($article_id);
            $article->magasins()->sync([$magasin->id => ['quantity' => $number]]);
            Auth::setFlash("Article correctement ajouté", "positive");
        }

        $articles = Article::all();
        echo $this->render('admin/magasin/edit.php', compact('magasin', 'articles'));
    }
    
    public function addQuantity($id, $articleid) {
        $number = Request::getInstance()->getInput()->get('number');
        if ($number > 00) {
            $article = Article::findOrFail($articleid);
            $article->magasins()->sync([$id => ['quantity' => $number]]);
            Auth::setFlash("Quantité correctement modifié", "positive");
        }
        Redirect::prev();
    }

    public function delItem($id, $articleid) {
        $article = Article::findOrFail($articleid);
        $article->magasins()->detach($id);
        Auth::setFlash("Quantité correctement modifié", "positive");

        Redirect::prev();
    }

    public function delete($id) {
        Magasin::destroy($id);
        Redirect::prev();
    }
}