<?php
namespace app\controllers;

use app\models\User;
use app\helper\Auth;
use app\helper\Link;

class AdminController extends BaseController
{
    public function index() {
        if(Auth::isAdmin())
        {
            echo $this->render('admin/index.php');
        }
    }

}
