<?php
namespace app\controllers;

use app\models\User;
use app\models\Article;
use Carbon\Carbon;
use app\helper\Auth;
use app\helper\Link;

class AdminController extends BaseController
{
    public function listArticles() {
        $articles = Article::all();
        echo $this->render('admin/articles.php', compact('articles'));
    }

    public function listUsers() {
        $users = User::all();
        echo $this->render('admin/users.php', compact('users'));
    }

    public function editArticle() {

    }

    public function deleteArticle($id) {
        $articles = Article::where('id', '=', $id)->delete();
		$this->listArticles();
    }

    public function editUser() {

    }

    public function deleteUser() {

    }

}
