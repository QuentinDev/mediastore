<?php
namespace app\controllers;

class HomeController extends BaseController
{
    public function index() {
        $title = 'text';
        echo $this->render('home/index.php', compact('title'));
    }
}