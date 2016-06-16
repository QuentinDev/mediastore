<?php

namespace app\helper;

use app\models\User;
use Carbon\Carbon;
use app\helper\links;


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
		return true;
	}

	public static function editUser($id, $login, $nom, $prenom, $email, $adresse, $cp, $tel, $grade) {
		$user = User::where('id', '=', $id)->first();
		$now = Carbon::now();
		$user->login = $login;
		$user->nom = $nom;
		$user->prenom = $prenom;
		$user->email = $email;
		$user->adresse = $adresse;
		$user->cp = $cp;
		$user->tel = $tel;
		$user->grade = $grade;
		$user->updated_at = $now;

		$user->save();
		return true;
	}

	public static function isAuth()
	{
		return isset($_SESSION['user']);
	}

	public static function isAdmin()
	{
		if (self::isAuth()) {
			return $_SESSION['user']->grade;
		}
		return false;
	}

	public static function loginExists($login)
	{
		return $user = User::where('login', '=', $login)->first();
	}
}
