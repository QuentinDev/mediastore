<?php
namespace app\controllers;

use app\models\User;
use app\models\Article;
use app\models\Type;
use Carbon\Carbon;
use app\helper\Auth;
use app\helper\Link;
use app\helper\UserHelper;
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
        $msg = null;
        $msgType = null;

        /* IMG Upload */
        if(isset($_FILES['articleImg']) && !empty($_FILES['articleImg']['name'])) {
            $target_dir = "assets/uploads/articles/";
            $_FILES["articleImg"]["name"] = "{$id}.png";
            $target_file = $target_dir . basename($_FILES["articleImg"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["articleImg"]["tmp_name"]);
            if($check !== false) {
                move_uploaded_file($_FILES['articleImg']['tmp_name'], $target_file);
            }else {
                unset($_POST); //to stop process at next condition
                $msg = "Un problème est survenue avec le format de l'image, veuillez ressayer";
                $msgType = "error";
            }
        }

        /* Proceed Article Form */
        if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['editeur']) && isset($_POST['typeId'])) {
            if(ArticleHelper::editArticle($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['editeur'], $_POST['typeId'])) {
                $msg = "Article correctement édité";
                $msgType = "positive";
            }else{
                $msg = "Une erreur est survenue, veuillez ressayer";
                $msgType = "error";
            }
        }
        $article = Article::where('id', '=', $id)->first();
        $types = Type::all();
        echo $this->render('admin/articleEdit.php', compact('article', 'types', 'msg', 'msgType'));
    }

    public function deleteArticle($id) {
        Article::where('id', '=', $id)->delete();
        $this->listArticles();
    }

    public function editUser($id) {
        $msg = null;
        $msgType = null;

        if(isset($_POST['id']) && isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['grade'])) {
            if(Auth::loginExists($_POST['login'])){
                $msg = "Ce login existe déjà";
                $msgType = "error";
            }elseif(Auth::editUser($_POST['id'], $_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['cp'], $_POST['tel'], $_POST['grade'])) {
                $msg = "Utilisateur correctement édité";
                $msgType = "positive";
            }else{
                $msg = "Une erreur est survenue, veuillez ressayer";
                $msgType = "error";
            }
        }
        $user = User::where('id', '=', $id)->first();

        echo $this->render('admin/userEdit.php', compact('user', 'msg', 'msgType'));
    }

    public function deleteUser($id) {
        User::where('id', '=', $id)->delete();
        $this->listUsers();
    }

    public function addUser() {
        $msg = null;
        $msgType = null;

        if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['grade'])) {
            if(Auth::loginExists($_POST['login'])){
                $msg = "Ce login existe déjà";
                $msgType = "positive";
            }elseif(Auth::register($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['email'], $_POST['adresse'], $_POST['cp'], $_POST['tel'], $_POST['grade'])) {
                $msg = "Utilisateur correctement ajouté";
                $msgType = "positive";
            }else{
                $msg = "Une erreur est survenue, veuillez ressayer";
                $msgType = "error";
            }
        }
        echo $this->render('admin/userEdit.php', compact('msg', 'msgType'));
    }

    public function addArticle() {
        $msg = null;
        $msgType = null;
        $types = Type::all();

        /* Proceed Article Form */
        if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['editeur']) && isset($_POST['typeId'])) {
            $article = ArticleHelper::addArticle($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['editeur'], $_POST['typeId']);
            if($article) {
                $msg = "Article correctement ajouté";
                $msgType = "positive";
                /* IMG Upload */
                if(isset($_FILES['articleImg']) && !empty($_FILES['articleImg']['name'])) {
                    $target_dir = "assets/uploads/articles/";
                    $_FILES["articleImg"]["name"] = "{$article->id}.png";
                    $target_file = $target_dir . basename($_FILES["articleImg"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $check = getimagesize($_FILES["articleImg"]["tmp_name"]);
                    if($check !== false) {
                        move_uploaded_file($_FILES['articleImg']['tmp_name'], $target_file);
                    }else {
                        $msg = "Un problème est survenue avec le format de l'image, veuillez ressayer";
                        $msgType = "error";
                    }
                }
            }else{
                $msg = "Une erreur est survenue, veuillez ressayer";
                $msgType = "error";
            }
        }
        echo $this->render('admin/articleEdit.php', compact('types', 'msg', 'msgType'));
    }

    public function index() {
        Redirect::url('AdminController@listArticles');
    }

}
