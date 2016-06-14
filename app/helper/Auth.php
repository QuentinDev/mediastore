<?php

namespace app\helper;

use app\models\User;
use Carbon\Carbon;


class Auth
{
	public static function auth($login = null, $password = null)
	{
		$user = User::where('login', $_POST['login'])->where('pwd', hash('sha256', $_POST['password']))->first();
		if($user) {
			$_SESSION['user'] = $user;
			return true;
		}
		return false;
	}

	public static function register($login, $nom, $prenom, $password, $email, $adresse, $cp, $tel) {
		$now = Carbon::now();
		$user = new User;
		$user->login = $login;
		$user->nom = $nom;
		$user->prenom = $prenom;
		$user->login = $login;
		$user->pwd =  hash('sha256', $password);
		$user->email = $email;
		$user->adresse = $adresse;
		$user->cp = $cp;
		$user->tel = $tel;
		$user->created_at = $now;
		$user->updated_at = $now;

		$user->save();
	}

	public static function isAuth($login = null, $password = null)
	{
		if(!empty($_SESSION['user'])){
			return true;
		}
		return false;
	}

	public static function logout($login = null, $password = null)
	{
		session_destroy();
	}
}
