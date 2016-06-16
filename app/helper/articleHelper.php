<?php

namespace app\helper;

use app\models\Article;
use Carbon\Carbon;

class ArticleHelper
{
	public static function editArticle($id, $nom, $status, $description, $prix, $editeur, $typeId)
	{
		$article = Article::where('id', '=', $id)->first();
		$now = Carbon::now();
		$article->nom = $nom;
		$article->status = $status;
		$article->description = $description;
		$article->prix = $prix;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->updated_at = $now;

		return $article->save();
	}

	public static function addArticle($nom, $status, $description, $prix, $editeur, $typeId)
	{
		$article = new Article;
		$now = Carbon::now();
		$article->nom = $nom;
		$article->status = $status;
		$article->description = $description;
		$article->prix = $prix;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->created_at = $now;
		$article->updated_at = $now;

		return $article->save();
	}

	public static function removeOutofstock() {
		return Article::where('status', '=', 'hors stock')->delete();
	}
}
