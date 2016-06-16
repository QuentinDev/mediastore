<?php
namespace app\controllers;

use app\models\User;
use app\models\Article;
use app\models\Type;
use app\helper\Auth;
use app\helper\ArticleHelper;
use app\helper\Redirect;

class AdminController extends BaseController
{
    public function listArticles() {
        $articles = Article::all();
        echo $this->render('admin/articles.php', compact('articles'));
    }

    public function listUsers() {
        $users = User::orderBy('created_at', 'DESC')->get();
        echo $this->render('admin/users.php', compact('users'));
    }

    public function editArticle($id) {

        /* IMG Upload */
        if(isset($_FILES['articleImg']) && !empty($_FILES['articleImg']['name'])) {
            $target_dir = "assets/uploads/articles/";
            $_FILES["articleImg"]["name"] = "{$id}.png";
            $target_file = $target_dir . basename($_FILES["articleImg"]["name"]);

            $check = getimagesize($_FILES["articleImg"]["tmp_name"]);
            if($check !== false) {
                move_uploaded_file($_FILES['articleImg']['tmp_name'], $target_file);
            }else {
                unset($_POST); //to stop process at next condition
                Auth::setFlash( "Un problème est survenue avec le format de l'image, veuillez réessayer", "error");
            }
        }

        /* Proceed Article Form */
        if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['status']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['editeur']) && isset($_POST['typeId'])) {
            if(ArticleHelper::editArticle($_POST['id'], $_POST['nom'], $_POST['status'], $_POST['description'], $_POST['prix'], $_POST['editeur'], $_POST['typeId'])) {
                Auth::setFlash("Article correctement édité", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        $article = Article::where('id', '=', $id)->first();
        $types = Type::all();

        echo $this->render('admin/articleEdit.php', compact('article', 'types'));
    }

    public function deleteArticle($id) {
        Article::where('id', '=', $id)->delete();
        $this->listArticles();
    }

    public function editUser($id) {
        if(isset($_POST['id']) && isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['grade'])) {
            if(Auth::loginExists($_POST['login'])){
                Auth::setFlash("Ce login existe déjà", "error");
            }elseif(Auth::editUser($_POST['id'], $_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['cp'], $_POST['tel'], $_POST['grade'])) {
                Auth::setFlash("Utilisateur correctement édité", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        $user = User::where('id', '=', $id)->first();

        echo $this->render('admin/userEdit.php', compact('user'));
    }

    public function deleteUser($id) {
        User::where('id', '=', $id)->delete();
        $this->listUsers();
    }

    public function addUser() {
        if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['grade'])) {
            if(Auth::loginExists($_POST['login'])){
                Auth::setFlash("Ce login existe déjà", "error");
            }elseif(Auth::register($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['email'], $_POST['adresse'], $_POST['cp'], $_POST['tel'], $_POST['grade'])) {
                Auth::setFlash("Utilisateur correctement ajouté", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        echo $this->render('admin/userEdit.php');
    }

    public function addArticle() {
        $types = Type::all();

        /* Proceed Article Form */
        if(isset($_POST['nom']) && isset($_POST['status']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['editeur']) && isset($_POST['typeId'])) {
            $article = ArticleHelper::addArticle($_POST['nom'], $_POST['status'], $_POST['description'], $_POST['prix'], $_POST['editeur'], $_POST['typeId']);
            if($article) {
                Auth::setFlash("Article correctement ajouté", "positive");
                /* IMG Upload */
                if(isset($_FILES['articleImg']) && !empty($_FILES['articleImg']['name'])) {
                    $target_dir = "assets/uploads/articles/";
                    $_FILES["articleImg"]["name"] = "{$article->id}.png";
                    $target_file = $target_dir . basename($_FILES["articleImg"]["name"]);

                    $check = getimagesize($_FILES["articleImg"]["tmp_name"]);
                    if($check !== false) {
                        move_uploaded_file($_FILES['articleImg']['tmp_name'], $target_file);
                    }else {
                        Auth::setFlash("Un problème est survenue avec le format de l'image, veuillez réessayer", "error");
                    }
                }
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        echo $this->render('admin/articleEdit.php', compact('types'));
    }

    public function index() {
        Redirect::url('AdminController@listArticles');
    }

    public function removeOutofstock() {
        ArticleHelper::removeOutofstock();
        $this->index();
    }

}
