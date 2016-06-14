<?php
namespace app\controllers;

class UserController extends BaseController
{
    public function login() {
		if(isset($_POST['login']) && isset($_POST['password']))
		{
            exit(var_dump('hello'));
		}
		echo $this->render('user/login.php');
    }

    public function register() {
        echo $this->render('user/register.php');
		if(isset($_POST['login']) && isset($_POST['password']))
		{

		}
		echo $this->render('user/register.php');
    }
}
